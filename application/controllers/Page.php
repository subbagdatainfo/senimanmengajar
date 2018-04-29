<?php

class Page extends CI_Controller {
	
	function index() {
		$data = $this->map();
		$this->load->view('template/navi',$data);
		$this->load->view('v_Landing');
		$this->load->view('template/foot');
	}

	public function about(){
		$data = $this->map();
		$this->load->view('template/navi',$data);
		$this->load->view('about');
		$this->load->view('template/foot');
	}
	public function persyaratan(){
		$data = $this->map();
		$this->load->view('template/navi',$data);
		$this->load->view('persyaratan');
		$this->load->view('template/foot');
	}
	public function lokasi(){
		$data = $this->map();
		$this->load->view('template/navi',$data);
		$this->load->view('lokasi');
		$this->load->view('template/foot');
	}
	public function timeline(){
		$data = $this->map();
		$this->load->view('template/navi',$data);
		$this->load->view('timeline');
		$this->load->view('template/foot');
	}
	public function galery(){
		$data = $this->map();
		$this->load->view('template/navi',$data);
		$this->load->view('galery');
		$this->load->view('template/foot');
	}
	public function daftar(){
		$data = $this->map();
		$this->load->view('template/navi',$data);
		$this->load->view('daftar');
		$this->load->view('template/foot');
	}
	public function contact(){
		$data = $this->map();
		$this->load->view('template/navi',$data);
		$this->load->view('contact');
		$this->load->view('template/foot');
	}
	public function map(){
		$config['center'] = '-6.225025, 106.802974';
		$config['zoom'] = '18';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '-6.225025, 106.802974';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		$data['provinsi']=$this->M_Peserta->getprovinsi();
		return $data;
	}

}
	
?>