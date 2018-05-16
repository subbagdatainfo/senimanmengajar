<?php
	class Peserta extends CI_Controller{
		public $kontenarray = array();
        public $piagam=array();
        public $fk=array();
        public $video=array();
		public function __construct(){
			parent::__construct();
		}
		public function landing(){
			$config['center'] = '-6.225025, 106.802974';
			$config['zoom'] = '18';
			$this->googlemaps->initialize($config);

			$marker = array();
			$marker['position'] = '-6.225025, 106.802974';
			$this->googlemaps->add_marker($marker);
			$data['map'] = $this->googlemaps->create_map();


			//$this->load->view('view_file', $data);
			//$this->load->view('template/header');
			$this->load->view('v_Landing', $data);
		
		}
		public function createpeserta(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nama', 'Nama', 'required|myAlpha',array(
                'required'      => 'Nama harus diisi.',
                'alpha_numeric'	=>'Format Nama tidak sesuai, hanya boleh menggunakan huruf'
                
        	));
        	$this->form_validation->set_rules('email', 'Email', 'required|valid_email',array(
                'required'      => 'Email harus diisi.',
                'valid_email'	=>'Format email tidak sesuai'
                
        	));
        	$this->form_validation->set_rules('no_telpon', 'Nomor Telpon', 'required|numeric',array(
                'required'      => 'Nomor Telpon harus diisi.',
                'numeric'	=>'Format no telpon tidak sesuai, hanya boleh menggunakan angka'
                
        	));
        	
        	
        	if ($this->form_validation->run() == FALSE) {
        		$message1=$this->session->set_flashdata('message',validation_errors());
				$message2=$this->session->set_flashdata('status', 'danger');
        		// $this->landing();
        		redirect(base_url().'Page/daftar','refresh');
				
        	} else {
        		$data = array();
				$data['nama_seniman'] = $this->input->post('nama');
				$data['nama_seniman']= $this->security->xss_clean($data['nama_seniman']);
				$data['no_telpon'] = $this->input->post('no_telpon');
				$data['email'] = $this->input->post('email');
				$data['lokasi']=$this->input->post('lokasi');
				mkdir('data/'.$data['nama_seniman'],0775);
				$data["path_upload"] = $this->uploadkonten($data["nama_seniman"]);
				//upload proposal
				if (NULL !== $data["path_upload"]) {
					$result=$this->M_Peserta->create($data);
					if ($result) {
						$message1=$this->session->set_flashdata('message','Pendaftaran Anda Berhasil');
						$message2=$this->session->set_flashdata('status', 'success');
						$this->email_confirm($data['email']);
						redirect(base_url().'Page/daftar','refresh');
						// mkdir('data/'.$data['nama_seniman'],0775);
					} else {
						$message1=$this->session->set_flashdata('message','Email Yang Anda Masukan Sudah Terdaftar');
						$message2=$this->session->set_flashdata('status', 'danger');
					}
				} else {
					$message1=$this->session->set_flashdata('message','Upload Gagal'.$this->upload->display_errors('<p>', '</p>'));
					$message2=$this->session->set_flashdata('status', 'danger'); 
		        	redirect(base_url().'Page/daftar','refresh');
				}
				// //insert data to database
				// $result=$this->M_Peserta->create($data);
				// if ($result) {
				// 	$message1=$this->session->set_flashdata('message','Pendaftaran Anda Berhasil');
				// 	$message2=$this->session->set_flashdata('status', 'success');
				// 	$this->email_confirm($data['email']);
				// 	mkdir('data/'.$data['nama_seniman'],0775);
				// } else {
				// 	$message1=$this->session->set_flashdata('message','Email Yang Anda Masukan Sudah Terdaftar');
				// 	$message2=$this->session->set_flashdata('status', 'danger');
				// }
				// //redirect to landing page with a message
				// redirect(base_url().'Page/daftar','refresh');
        	}
		}

		function email_confirm($alamat_email){
			$config = array(
							    'protocol'  => 'smtp',
							    'smtp_host' => 'ssl://mail.kemdikbud.go.id',
							    'smtp_port' => 465,
							    'smtp_user' => 'senimanmengajar@kemdikbud.go.id',
							    'smtp_pass' => 'Ajar#4d1kbuD',
							    'mailtype'  => 'html',
							    'charset'   => 'utf-8'
							);
			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			//Email content
			$htmlContent = '<h1>Selamat Anda Telah Berhasil Mendaftar</h1>';
			$htmlContent .= '<p>Selamat Anda telah berhasil mendaftar sebagai calon peserta Seniman Mengajar.</p>
							<p>Untuk Informasi dan pertanyaan mengenai kegiatan Seniman Mengajar dapat dilihat di <a href='."kebudayaan.kemdikbud.go.id> website Direktorat Kesenian,Ditjen Kebudyaan".'</a></p>';

			$this->email->to($alamat_email);
			$this->email->from('senimanmengajar@kemdikbud.go.id', 'Panitia Seniman Mengajar');
			$this->email->subject('Selamat, Anda telah berhasil mendaftar');
			$this->email->message($htmlContent);

			//Send email
			$this->email->send();
						
		}

		
		public function uploadkonten($nama){
			$pathdirectory='data/'.$nama;
			$namaupload=trim($nama);
			$config['file_name'] =  $namaupload.'_proposal';
	        $config['upload_path'] = $pathdirectory;
	        $config['allowed_types'] = 'pdf|jpg|doc|docx';
	        $config['overwrite'] = TRUE;
	        $config['remove_spaces']=FALSE;
	        

	        $this->upload->initialize($config);
	        if ($this->upload->do_upload()){
	            	$data_file = $this->upload->data();
	            	$file_ext = $data_file['file_ext'];
	            	$pathdir=$config['upload_path'].'/'.$config['file_name'].$file_ext;
	            	return $pathdir;
	   
	        } else{
	        	return NULL;
	    	}


	    	
		}

		

		
	}