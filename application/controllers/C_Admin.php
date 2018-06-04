<?php
	class C_Admin extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('M_Admin');
			$this->load->library('pagination');
		}
		public function admin(){
			if ($this->session->userdata('logged')['logged'] ) {
				
				$data['count']=$this->getcount();
				$config = array();
				$config["base_url"] = base_url() . "C_Admin/admin";
				$total_row = $data['count'];
				$config["total_rows"] = $total_row;
				$config["per_page"] = 25;
				$config['use_page_numbers'] = TRUE;
				$config['num_links'] = $total_row;
				$config['first_tag_open'] = $config['last_tag_open'] = $config['next_tag_open'] = $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        		$config['first_tag_close'] = $config['last_tag_close'] = $config['next_tag_close'] = $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
         
        		$config['cur_tag_open'] = '<li class="active"><span><b>';
       			$config['cur_tag_close'] = '</b></span></li>';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';

				$this->pagination->initialize($config);
				// if($this->uri->segment(3)){
				// 	$page = ($this->uri->segment(3)) ;
				// }else{
				// 	$page = 1;
				// }
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        		$offset = $page == 0 ? 0 : ($page - 1) * $config["per_page"];
				$data['peserta'] = $this->M_Admin->getallpeserta($config["per_page"], $offset);
				
				
				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );
				$data['page'] = $page==0? 1:$page;
				// View data according to array.
				$this->load->view('navigation');
				$this->load->view("v_admin", $data);
				// $this->load->view("image", $data);
			} else {
				$this->load->view('v_loginadmin');
			}
		}

		public function searchpeserta(){
			$nama= $this->input->post('nama');
			$data['peserta']= $this->M_Admin->searchpeserta($nama);
			if ($data['peserta'] !== NULL) {

				foreach ($data['peserta'] as $key ) {
					$data['profpict'][$key->email]= $this->M_Admin->getstatusprofpict($key->email);
					$data['sks'][$key->email]= $this->M_Admin->getstatussks($key->email);
					$data['drh'][$key->email]= $this->M_Admin->getstatusdrh($key->email);
					$data['essai'][$key->email]= $this->M_Admin->getstatusessai($key->email);
					$data['fk'][$key->email]= $this->M_Admin->getstatusfk($key->email);
					$data['ktp'][$key->email]= $this->M_Admin->getstatusktp($key->email);
					$data['video'][$key->email]= $this->M_Admin->getstatusvideo($key->email);
				}
				$this->load->view('navigation');
				$this->load->view("v_search", $data);
			} else {
				$message1=$this->session->set_flashdata('message','Nama Tidak Ditemukan');
				$message2=$this->session->set_flashdata('status', 'danger');
				redirect(base_url().'C_Admin/admin','refresh');
			}
		}

		public function del_data(){
			$nama = $this->input->post("nama");
			$email = $this->input->post("email");
			$del_dir = $this->delete_files("data/".$nama);
			if (!$del_dir) {
				$del_db = $this->M_Admin->del_data($email);
				if (!$del_db) {
					echo "Data Berhasil Di Hapus";
				} else {
					echo "file peserta berhasil dihapus, tapi data peserta masih tercatat";
				}
				
			} else {
				echo "data gagal untuk dihapus";
			}
			
			
		}

		function delete_files($path) {
		    // Open the source directory to read in files
	        $i = new DirectoryIterator($path);
	        foreach($i as $f) {
	            if($f->isFile()) {
	                unlink($f->getRealPath());
	            } else if(!$f->isDot() && $f->isDir()) {
	                rrmdir($f->getRealPath());
	            }
	        }
	        rmdir($path);
		}


		public function download($email)
	    {
	    	$name = $this->M_Admin->getdirdownload($email);
	    	foreach ($name->result_array() as $key ) {
	    		$dirname='data/'.$key['nama_seniman'];
	    		$name=$key['nama_seniman'];
	    	}
	        // $dirmain="upload/data/" . $registration_no ;			
	        // $dirname=$dirmain . "/lampiran";
	        // $dirthumb=$dirmain . "/thumbnail" ;	
	    	
	    	$this->zip->read_dir($dirname, FALSE);
	    	//$this->zip->clear_data();
	    	$archieve=$this->zip->archive('zip/'.$name.'.zip');
	    	$this->zip->clear_data();
	    	

	        $file_path=realpath($dirmain);
	        $file_zip=  $name . ".zip";

	        $myfile =  "zip/" .$file_zip;
	        ob_end_clean();
	        // $this->zip->download($file_zip);           
	        header("Content-Type: application/zip");
	        header("Content-Disposition: attachment; filename=$file_zip");
	        header("Content-Length: " . filesize($myfile));

	        readfile($myfile);
	        ob_end_clean();
	        // $this->zip->downlo
	        //exit;		  		  
		}

		public function makezipall(){
			$name = $this->M_Admin->getdirdownloadall();
	    	foreach ($name->result_array() as $key ) {
	    		$dirname='data/'.$key['nama_seniman'];
	    		$name=$key['nama_seniman'];
	    		$this->zip->read_dir($dirname, FALSE);
		    	//$this->zip->clear_data();
		    	$archieve=$this->zip->archive('zip/'.$name.'.zip');
		    	$this->zip->clear_data();
	    	}
	    	echo "sukses";
		}

		public function makezipbyregion($regions){
			$region = $this->M_Admin->getdirbyregion($regions);
			foreach ($region->result_array() as $key ) {
				$regiondir = $key['region'];
				$name = $this->M_Admin->getdirdownloadbyregion($regiondir);
				$dirregion = 'zip/'.$regiondir;
				mkdir($dirregion,0775);
		    	foreach ($name->result_array() as $key ) {
		    		$dirname='data/'.$key['nama_seniman'];
		    		$name=$key['nama_seniman'];
		    		$this->zip->read_dir($dirname, FALSE);
			    	//$this->zip->clear_data();
			    	$archieve=$this->zip->archive('zip/'.$regiondir.'/'.$name.'.zip');
			    	$this->zip->clear_data();
			    	//ob_end_clean();
			    	ob_clean();
		    	}
		    	echo "sukses<br>";
			}
		}

		public function copy($regions){
			$region = $this->M_Admin->getdirbyregion($regions);
			foreach ($region->result_array() as $key ) {
				$regiondir = $key['region'];
				$name = $this->M_Admin->getdirdownloadbyregion($regiondir);
				$dirregion = 'zip/'.$regiondir;
				mkdir($dirregion,0775);
		    	foreach ($name->result_array() as $key ) {
		    		$dirname='data/'.$key['nama_seniman'];
		    		copy($dirname.'/*', $dirregion.'/'.$key['nama_seniman']);

		    			    	}
		    	echo "sukses<br>";
			}
		}

		public function copyall(){
			$lokasi = $this->M_Admin->getregion();
			foreach ($lokasi->result_array() as $key_lokasi ) {
				$dirregion = 'zip/'.$key_lokasi['lokasi'];
				mkdir($dirregion,0775);
				$list_peserta = $this->M_Admin->getdirdownloadbyregion($key_lokasi['lokasi']);
				foreach ($list_peserta->result_array() as $key_file ) {
					$dirname='data/'.$key_file['nama_seniman'];
		    		copy($dirname.'/'.$key_file['nama_seniman'], $dirregion.'/'.$key_file['nama_seniman']);
				}
				echo "sukses ".$key_lokasi['lokasi']."<br>";
			}

		}
		public function getcount(){
			$countpeserta = $this->M_Admin->getcountpeserta();
			// foreach ($countpeserta as $key ) {
			// 	$count = 
			// }
			return $countpeserta;
		}

		public function region(){
			
			if ($this->session->userdata('logged')['logged'] ) {
				
				$data['count']=$this->getcount();
				$data['maestro']=$this->M_Admin->getcountbyregion();
				// View data according to array.
				$this->load->view('navigation');
				$this->load->view("v_region", $data);
			} else {
				$this->load->view('v_loginadmin');
			}
		}

		public function authadmin(){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			
			if ($username == 'admin_sm' && $password=='p4p4nd4y4n') {
				$sess_array = array('username' => $username, 'logged' => TRUE );
				$this->session->set_userdata('logged',$sess_array);
				redirect(base_url().'C_Admin/admin','refresh');
			} else {
				$this->session->set_flashdata('message', 'Username atau Password Salah');
				redirect(base_url().'Page/admin','refresh');
			}	
		}

		

		public function adminlogout(){
			$this->session->sess_destroy();
			$this->loginadmin();
		}

		public function sendmail(){
			//load view untuk interface kirim email
			$this->load->view('navigation');
			$this->load->view('sendmail');
		}

		public function send(){
			// if (NULL != $this->input->post('userfile')) {
			if ($_FILES['userfile']['error']==UPLOAD_ERR_OK){
				$detail_email['attach_path']='';
				$pathdirectory='assets/';
				$config['upload_path'] = $pathdirectory;
				$config['allowed_types'] = 'pdf|jpg|png|doc|docx';
				$config['file_name'] = "attachment";
				$this->upload->initialize($config);
				$this->upload->do_upload();
				$data_file = $this->upload->data();
	            $file_ext = $data_file['file_ext'];
				$detail_email['attach_path']='assets/attachment'.$file_ext;
				$config['overwrite'] = TRUE;
			} 
			
			$addressall='';
			$detail_email['message'] = $this->input->post('pesan');
			//echo 'message : '.$detail_email['message'].'<br>';
			$detail_email['subject'] = $this->input->post('subject');
			//echo 'subject : '.$detail_email['subject'].'<br>';
			if (NULL !== ($this->input->post('all'))) {
				$emailaddress=array();
				$email=$this->M_Admin->getemail();
				foreach ($email->result_array() as $key ) {
					$detail_email['address']=$key['email'];
					//echo 'address : '.$detail_email['address'].'<br>';
					// $status=$this->sendtoaddress($detail_email);
					$addressall=$key['email'].','.$addressall;
				}
				$detail_email['address']=$addressall;
				$status=$this->sendtoaddress($detail_email);
			} else {
				$detail_email['address']=$this->input->post('address');
				//echo 'address : '.$detail_email['address'].'<br>';
				$status=$this->sendtoaddress($detail_email);
			}
			if ($status) {
				$message1=$this->session->set_flashdata('message','Email berhasil dikirm');
				$message2=$this->session->set_flashdata('status', 'success');
				redirect(base_url().'C_Admin/sendmail','refresh');
			} else {
				$message1=$this->session->set_flashdata('message',show_error($this->email->print_debugger()));
				$message2=$this->session->set_flashdata('status', 'danger');
				redirect(base_url().'C_Admin/sendmail','refresh');
			}
		}

		public function sendtoaddress($detail_email){
			$this->load->library('email');
			 $this->email->clear(TRUE);
			$this->email->from('senimanmengajar.kemdikbud@gmail.com', 'Panitia Seniman Mengajar');
			//$this->email->to('karyana.abdhadi@gmail.com');
			$this->email->bcc($detail_email['address'],10);
			$this->email->set_newline("\r\n");
			$this->email->subject($detail_email['subject']);
			$this->email->message($detail_email['message']);
			if (isset($detail_email['attach_path'])) {
				$this->email->attach($detail_email['attach_path']); 
			} 
			
			if ($this->email->send()) {
				return TRUE;
			} else {
				return FALSE;
			}
			
			
			// echo $this->email->print_debugger();
			// echo smtp_user();
		}

		

	}