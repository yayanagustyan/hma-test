<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index(){
		$data['title'] = "Login";
		$script['js'] = array(base_url('assets/js/controllers/User.js'));

		$data['users'] = curl_post(array(), '/users')->data;

		$this->load->view('template/header', $data);
		$this->load->view('master/user', $data);
		$this->load->view('template/footer', $script);
	}

	public function add(){
		$data['title'] = "Login";
		$script['js'] = array(base_url('assets/js/controllers/User.js'));

		$this->load->view('template/header', $data);
		$this->load->view('master/user_add', $data);
		$this->load->view('template/footer', $script);
	}

	public function edit($code){
		$data['title'] = "Login";
		$script['js'] = array(base_url('assets/js/controllers/User.js'));

		$data['user'] = curl_post(array('user_id'=>$code), '/users/id')->data;

		$this->load->view('template/header', $data);
		$this->load->view('master/user_add', $data);
		$this->load->view('template/footer', $script);
	}


}
