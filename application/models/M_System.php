<?php
	class M_System extends CI_Model{
		/* login controller untuk pendaftar*/
		public function auth_peserta($username,$password){
			$data = $this->db->query("select * from peserta where username ='$username' and password='$password'");
			if($data->num_rows>0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}