<?php

	class c_Authentification extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('m_Authentification');
			$this->client_logon = $this->session->userdata('logged');
		}

		public function index(){
			if($this->client_logon){
				if($this->client_logon){
				$data=$this->session->userdata('logged');
				redirect('index.php/c_Admin',$data);
				}else{
					$data['message'] = null;
					$this->load->view('Admin/LogIn',$data);
				}
			}
		}
	}
?>