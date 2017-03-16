<?php

class c_Landing extends CI_Controller {
	
	function index() {
		

		$this->load->library('googlemaps');

$config['center'] = '0.976346, 111.603637';
$config['zoom'] = '12';
$this->googlemaps->initialize($config);

$marker = array();
$marker['position'] = '0.976346, 111.603637';
$this->googlemaps->add_marker($marker);
$data['map'] = $this->googlemaps->create_map();


		//$this->load->view('view_file', $data);
		$this->load->view('v_Landing', $data);
	}

}
	
?>