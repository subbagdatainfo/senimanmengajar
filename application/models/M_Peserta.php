
<?php
	class M_Peserta extends CI_ModeL{
		//insert data pendaftar ke dalam database
		public function create($data){
			$this->db->insert('peserta',$data);
		}
		//get konten pendaftar
		function getdetailseniman($id_seniman){
			$this->db->select('*');
			$this->db->from('pendaftar');
			
			$this->db->where('pendaftar.id_seniman =', $id_seniman);
			
			$query = $this->db->get();
			return $query->result();
		}
		
	}
