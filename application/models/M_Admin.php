
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

		public function getstatusprofpict($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from konten where email = '$email' and JENIS = 'profpict')");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from konten where email = '$email' and JENIS = 'profpict')"];
			}
		}

		public function getstatussks($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from konten where email = '$email' and JENIS = 'sks')");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from konten where email = '$email' and JENIS = 'sks')"];
			}
		}

		public function getstatussr($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from konten where email = '$email' and JENIS = 'sr')");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from konten where email = '$email' and JENIS = 'sr')"];
			}
		}

		public function getstatusdrh($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from konten where email = '$email' and JENIS = 'drh')");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from konten where email = '$email' and JENIS = 'drh')"];
			}
		}

		public function getstatusfk($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from foto where email = '$email' )");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from foto where email = '$email' )"];
			}
		}

		public function getstatusktp($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from konten where email = '$email' and JENIS = 'ktp')");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from konten where email = '$email' and JENIS = 'ktp')"];
			}
		}

		public function getstatusessai($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from konten where email = '$email' and JENIS = 'essai')");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from konten where email = '$email' and JENIS = 'essai')"];
			}
		}

		public function getstatusvideo($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from video where email = '$email' )");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from video where email = '$email' )"];
			}
		}

		public function getcountbyregion(){
			$region=$this->db->query("SELECT region,COUNT(region) FROM peserta GROUP BY region");
			return $region;
		}

		public function getdirbyregion($regions){
			$region = $this->db->query("SELECT distinct region from peserta where region like '%$regions%'");
			return $region;
		}

		public function getdirdownloadbyregion($regiondir){
			$name = $this->db->query("SELECT nama_seniman from peserta where region = '$regiondir'");
			return $name;
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