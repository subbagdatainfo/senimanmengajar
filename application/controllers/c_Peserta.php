<?php
	class c_Peserta extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('m_Peserta');
		}

		public function createpeserta(){
			$data = array();
			$data['nama_seniman'] = $this->input->post('nama');
			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');
			$data['no_telpon'] = $this->input->post('no_telpon');
			$data['email'] = $this->input->post('email');
			$data['jenis_seni'] = $this->input->post('jenis_seni');

			
			$this->m_Peserta->create($data);
			redirect('http://localhost#daftar','refresh');
		}
	}
