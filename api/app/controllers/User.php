<?php

include_once __DIR__ . '/../core/Base.php';

/**
 * 
 */
class User {
	private $base;

	function __construct(){
		$this->base = new BaseFunction;
	}

	function get_user($req, $res, $args){
		$json = $this->base->db_select("tb_user","*");
		return $this->base->renderJSON($res, $json);
	}

	function get_user_id($req, $res, $args){
		$data = $req->getParsedBody();
		$id = $data['user_id'];

		$json = $this->base->db_select_where("tb_user","*", array("user_id"=>$id));
		return $this->base->renderJSON($res, $json);
	}


	function save_user($req, $res, $args){
		$data = $req->getParsedBody();
		$json = $this->base->db_insert("tb_user",$data);
		return $this->base->renderJSON($res, $json);
	}

	function update_user($req, $res, $args){
		$data = $req->getParsedBody();
		$json = $this->base->db_update("tb_user", $data, array("user_id"=>$data['user_id']));
		return $this->base->renderJSON($res, $json);
	}

	function delete_user($req, $res, $args){
		$code = $args['code'];
		$json = $this->base->db_delete("tb_user", array("user_id"=>$code));
		return $this->base->renderJSON($res, $json);
	}

}

?>