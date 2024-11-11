<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function index(){
		$data['title'] = "Setting";
		$script['js'] = array(base_url('assets/js/controllers/Settings.js'));

		$menus = curl_get('/menus')->data;
		$this->session->set_userdata("menus", $menus);

		$params = curl_get('/params');
		foreach ($params->data as $k => $v) {
			$this->session->set_userdata($v->prm_name, $v->prm_value);
		}

		$data['menus'] = $menus;
		$this->load->view('template/header', $data);
		$this->load->view('settings/setting_add', $data);
		$this->load->view('template/footer', $script);
	}


}
