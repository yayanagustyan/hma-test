<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
		$data['title'] = "Dashboard";

		if ($this->session->userdata('login_id') == null ) {
			redirect(base_url('account/logout'));
		}

		$params = curl_get('/params');
		foreach ($params->data as $k => $v) {
			$this->session->set_userdata($v->prm_name, $v->prm_value);
		}

		$menus = curl_get('/menus')->data;
		$this->session->set_userdata("menus", $menus);


		$logged = 0;
		$users = curl_post(array(), '/users')->data;
		foreach ($users as $k => $v) {
			if ($v->user_login == 1) {
				$logged++;
			}
		}

		$data['logged'] = $logged;
		$data['total'] = count($users);

		$this->load->view('template/header', $data);
		$this->load->view('home', $data);
		$this->load->view('template/footer');
	}
}
