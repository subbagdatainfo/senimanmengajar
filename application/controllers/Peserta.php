<?php
	class Peserta extends CI_Controller{
		public $kontenarray = array();
        public $piagam=array();
        public $fk=array();
        public $video=array();
		public function __construct(){
			parent::__construct();
		}
		public function tes(){
			echo "tes";
		}
		public function createpeserta(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nama', 'Nama', 'required|alpha',array(
                'required'      => 'Nama harus diisi.',
                'alpha'	=>'Format Nama tidak sesuai, hanya boleh menggunakan huruf'
                
        	));
        	$this->form_validation->set_rules('email', 'Email', 'required|valid_email',array(
                'required'      => 'Email harus diisi.',
                'valid_email'	=>'Format email tidak sesuai'
                
        	));
        	$this->form_validation->set_rules('no_telpon', 'Nomor Telpon', 'required|is_natural',array(
                'required'      => 'Nomor Telpon harus diisi.',
                'is_natural'	=>'Format no telpon tidak sesuai, hanya boleh menggunakan angka'
                
        	));
        	$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric',array(
                'required'      => 'Nomor Telpon harus diisi.',
                'alpha_numeric'	=>'Format username tidak sesuai, hanya boleh menggunakan huruf dan angka'
                
        	));
        	if ($this->form_validation->run() == FALSE) {
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
				// redirect(base_url().'#daftar');
        	} else {
        		$data = array();
				$data['nama_seniman'] = $this->input->post('nama');
				$data['username'] = $this->input->post('username');
				$data['password'] = $this->input->post('password');
				$data['no_telpon'] = $this->input->post('no_telpon');
				$data['email'] = $this->input->post('email');
				$data['jenis_seni'] = $this->input->post('jenis_seni');
				$data['region']=$this->input->post('chk');
				
				//insert data to database
				$result=$this->M_Peserta->create($data);
				if ($result) {
					$message1=$this->session->set_flashdata('message','Pendaftaran Anda Berhasil');
					$message2=$this->session->set_flashdata('status', 'success');
					mkdir('data/'.$data['username'],0775);
				} else {
					$message1=$this->session->set_flashdata('message','Email Yang Anda Masukan Sudah Terdaftar');
					$message2=$this->session->set_flashdata('status', 'danger');
				}
				//redirect to landing page with a message
				redirect(base_url().'#daftar','refresh');
        	}
        	
			// $data = array();
			// $data['nama_seniman'] = $this->input->post('nama');
			// $data['username'] = $this->input->post('username');
			// $data['password'] = $this->input->post('password');
			// $data['no_telpon'] = $this->input->post('no_telpon');
			// $data['email'] = $this->input->post('email');
			// $data['jenis_seni'] = $this->input->post('jenis_seni');
			// $data['region']=$this->input->post('chk');
			
			// //insert data to database
			// $result=$this->M_Peserta->create($data);
			// if ($result) {
			// 	$message1=$this->session->set_flashdata('message','Pendaftaran Anda Berhasil');
			// 	$message2=$this->session->set_flashdata('status', 'success');
			// 	mkdir('data/'.$data['username'],0775);
			// } else {
			// 	$message1=$this->session->set_flashdata('message','Email Yang Anda Masukan Sudah Terdaftar');
			// 	$message2=$this->session->set_flashdata('status', 'danger');
			// }
			// //redirect to landing page with a message
			// redirect(base_url().'#daftar','refresh');

		}
	}