<?php
	class c_Peserta extends CI_Controller{

		public function __construct(){
			parent::__construct();
		}

		public function createpeserta(){
			$data = array();
			$data['nama_seniman'] = $this->input->post('nama');
			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');
			$data['no_telpon'] = $this->input->post('no_telpon');
			$data['email'] = $this->input->post('email');
			$data['jenis_seni'] = $this->input->post('jenis_seni');
			$data['region']=$this->input->post('chk');

			
			$this->m_Peserta->create($data);
			redirect('http://localhost#daftar','refresh');
		}

		function upload() {
			$data = array();
			//$id_siswa = $this->session->userdata('id_siswa');
			$this->m_Peserta->id_peserta = $id_peserta;
			$jenis = $this->input->post('jenis');

			if ($jenis != 'youtube'){
				$config['file_name'] =  $id_siswa.'_'. $jenis.'_'.$time_upload;
	            $config['upload_path'] = './assets/'.$data['nama_seniman'];
	            $config['allowed_types'] = 'pdf|jpg|png';
	            $this->upload->initialize($config);

	            if ($this->upload->do_upload())
	            {
	            	$data_file = $this->upload->data();
	            	$file_ext = $data_file['file_ext'];
	            	$this->Konten->jenis = $jenis;
	            	$this->Konten->url = $id_siswa.'_'.$jenis.''.$file_ext; 
	            }
				
			} else {
				$this->Konten->jenis = 'youtube';
				$this->Konten->url = $this->input->post('link');	
	        }
	        $this->m_Peserta->save(); 
	        redirect('c_Peserta/detail');
		}

		public function getdetailseniman($id_seniman){
			$data=$this->m_Peserta->getdetailseniman($id_seniman);
			$this->load->view('v_form', $data);
		}

		public function login(){
			$this->load->view('v_login');
		}
	}
