
<?php
	class M_Peserta extends CI_ModeL{
		//insert data pendaftar ke dalam database
		public function create($data){
			$result=$this->db->insert('peserta',$data);
			$emailinsert=$data['email'];
			
			$path = 'data/'.$data['username'];
			if ($result) {
				//$query=$this->db->query("insert INTO portofolio (email,jenis,path) VALUES('$emailinsert','profpict', $path),('$emailinsert','sks', $path),('$emailinsert','drh', $path),('$emailinsert','video', $path)");
				return TRUE;
			} else {
				return FALSE;
			}
			
		}
		//get konten pendaftar
		public function getdetailseniman($email_seniman){
			// $detail = $this->db->query("SELECT * FROM `peserta`
			// 							left join portofolio
			// 							on peserta.email=portofolio.email
			// 							where peserta.email='$email_seniman'");
			$detail = $this->db->query("SELECT * from peserta where email='$email_seniman'");
			return $detail;
		}
		public function getkontenseniman($email_seniman){
			$konten = $this->db->query("SELECT * from portofolio where email= '$email_seniman'");
			return $konten;
		}
		
		public function uploadkonten($konten){
			$inputkonten=$this->db->insert('portofolio', $konten);
			if ($inputkonten) {
				return TRUE;
			} else {
				return FALSE;
			}
			
		}
		public function directory(){
			$dir=$this->db->query("SELECT distinct username from peserta group by email");
			return $dir;
		}
	}
