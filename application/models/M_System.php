<?php 
	class M_System extends CI_Model{
		public function __construct(){
			$table = 'peserta';
			parent::__construct();
		} 
		public function auth_peserta($username,$password){
			$data = $this->db->query("SELECT * FROM peserta WHERE username='$username' AND password='$password'");
			if($data->num_rows()>0){
				return $data;
			}else{
				return $data;
			}
		}

	}