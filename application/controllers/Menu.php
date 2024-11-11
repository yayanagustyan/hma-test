<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function edit($code){
		$data['title'] = "Setting";
		$script['js'] = array(base_url('assets/js/controllers/Setting.js'));

		$data['menus'] = curl_get('/menus/'.$code)->data;

		$this->load->view('template/header', $data);
		$this->load->view('settings/setting_edit', $data);
		$this->load->view('template/footer');
	}


}
