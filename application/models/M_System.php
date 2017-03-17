<?php 
	class M_System extends CI_Model{
		public function __construct(){
			$table = 'peserta';
			parent::__construct();
		} 
		public function auth_peserta($username,$password){
			$data = $this->db->query("SELECT password,id_seniman FROM peserta WHERE username='$username'");
			foreach ($auth->result() as $row)
				{
				        echo $this->encrypt->decode($row->password)."<br>";
				        
				}
			if($data->num_rows()>0){
				return $data;
			}else{
				return $data;
			}
		}

	}