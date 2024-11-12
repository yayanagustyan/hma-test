<?php

include_once __DIR__ . '/../core/Base.php';

/**
 * 
 */
class Account {
	private $base;

	function __construct(){
		$this->base = new BaseFunction;
	}


	function web_login($req, $res, $args){
		$data = $req->getParsedBody();
		$json = $this->base->db_select_where("tb_user", "*", 
			array("user_email"=>$data['username'], "user_pass"=> $data['password'])
		);
		if (count($json['data'])<1) {
			$json = array(
				"status"	=> false,
				"code"  	=> 404,
				"message" => "Data tidak ditemukan",
				"data"		=> array(),
			);
		}else{
			// update user login
			$this->base->db_update("tb_user", array("user_login"=>1), array("user_email"=> $data['username'] ) );
		}

		return $this->base->renderJSON($res, $json);
	}



}

?>