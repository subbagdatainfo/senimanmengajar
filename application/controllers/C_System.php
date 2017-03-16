<?php
	class c_System extends CI_Controller{
		public function __construct(){
			parent ::__construct();
		}

		public function auth(){
			$datalogin= array();
			$data['username']= $this->input->post('username');
			$data['password']=$this->input->post('password');
			$status = $this->M_System->auth_peserta($data['username'],$data['password']);
		}
	}