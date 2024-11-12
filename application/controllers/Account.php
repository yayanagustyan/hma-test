<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function login(){
		$data['title'] = "Login";
		$script['js'] = array(base_url('assets/js/controllers/Login.js'));

		$this->load->view('account/login', $script);
	}

	public function login_success($code){
		$data = array("user_id"=>$code);
		$dt = curl_post($data, "/users/id");
		echo json_encode($dt->data[0]);

		$d = $dt->data[0];

		$sess = array(
			"login_id" 		=> $d->user_id,
			"login_name" 	=> $d->user_name,
			"login_email" => $d->user_email,
			"login_image" => $d->user_image,
		);
		$this->session->set_userdata($sess);

		redirect(base_url());
	}

	public function logout(){
		$payload = array(
			"user_id"    => $this->session->userdata('login_id'),
			"user_login" => 0,
		);
		$cek = curl_post($payload, "/users/update")->data;

		$this->session->sess_destroy();
		redirect(base_url('account/login'));
	}



}
