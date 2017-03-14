<?php
	class m_Peserta extends CI_ModeL{

		//insert data pendaftar ke dalam database
		public function create($data){
			$this->db->insert('peserta',$data);
		}

		//get konten pendaftar
		function getdetailseniman($id_seniman){
			$this->db->select('*');
			$this->db->from('pendaftar');
			//$this->db->join('konten', 'konten.id_siswa = siswa.id_siswa','left');
			$this->db->where('pendaftar.id_seniman =', $id_seniman);
			
			$query = $this->db->get();
			return $query->result();
		}

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

