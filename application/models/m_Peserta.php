<?php
	class m_Peserta extends CI_ModeL{
		public function create($data){
		$this->db->insert('peserta',$data);
	}
	}

