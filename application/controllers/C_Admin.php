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
				$total_row = $this->M_Admin->getcountpeserta();
				$config["total_rows"] = $total_row;
				$config["per_page"] = 20;
				$config['use_page_numbers'] = TRUE;
				$config['num_links'] = $total_row;
				$config['cur_tag_open'] = '&nbsp;<a class="current">';
				$config['cur_tag_close'] = '</a>';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';

				$this->pagination->initialize($config);
				if($this->uri->segment(3)){
					$page = ($this->uri->segment(3)) ;
				}else{
					$page = 1;
				}
				$data['peserta'] = $this->M_Admin->getallpeserta($config["per_page"], $page);
				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );

				// View data according to array.
				$this->load->view("v_admin", $data);
			} else {
				$this->load->view('v_loginadmin');
			}
		}

		public function getcount(){
			$countpeserta = $this->M_Admin->getcountpeserta();
			// foreach ($countpeserta as $key ) {
			// 	$count = 
			// }
			return $countpeserta;
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
				redirect(base_url().'C_Admin/loginadmin','refresh');
			}	
		}

		public function loginadmin(){
			// $this->load->view('template/header');
			$this->load->view('v_loginadmin');
		}

		public function adminlogout(){
			$this->session->sess_destroy();
			$this->loginadmin();
		}
	}