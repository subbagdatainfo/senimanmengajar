
<?php
	
	
	class M_Admin extends CI_Model {
		function __construct() {
			parent::__construct();
		}
		// Count all record of table "contact_info" in database.
		public function getcountpeserta() {
			return $this->db->count_all("peserta");
		}

		// Fetch data according to per_page limit.
		public function getallpeserta($limit, $id) {
			// $this->db->limit($limit);
			//$this->db->where('id', $id);
			// $query = $this->db->get("peserta");
			$query=$this->db->query("SELECT * FROM peserta ORDER BY nama_seniman ASC limit $id,$limit ");
			
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$data[] = $row;
			}

			return $data;
			}
			return false;
		}

		public function getemail(){
			$query=$this->db->query("SELECT email from peserta");
			return $query;
		}

		function del_data($email){
			// $query = $this->db->query("DELETE FROM peserta where email='$email'");
			$this->db->where('email', $email);
			$this->db->delete('peserta');
		}

		public function getcountbyregion(){
			$region=$this->db->query("SELECT region,COUNT(region) FROM peserta GROUP BY region");
			return $region;
		}

		public function getdirbyregion($regions){
			$region = $this->db->query("SELECT distinct region from peserta where region like '%$regions%'");
			return $region;
			$this->db->save_queries = false;
		}

		public function getdirdownloadbyregion($regiondir){
			$name = $this->db->query("SELECT nama_seniman from peserta where region = '$regiondir'");
			return $name;
			$this->db->save_queries = false;
		}

		public function getdirdownload($email){
			$query=$this->db->query("SELECT nama_seniman FROM peserta WHERE email = '$email'");
			return $query;
		}

		public function getdirdownloadall(){
			$query=$this->db->query("SELECT nama_seniman FROM peserta ");
			return $query;
		}

		public function searchpeserta($nama){
			$query = $this->db->query("SELECT * FROM peserta WHERE nama_seniman like '%$nama%' ");
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$data[] = $row;
			}

			return $data;
			}
			return NULL;
		}
	}