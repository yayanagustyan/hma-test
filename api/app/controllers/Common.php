<?php

include_once __DIR__ . '/../core/Base.php';

/**
 * 
 */
class Common {
	private $base;

	function __construct(){
		$this->base = new BaseFunction;
	}


	function base64_upload($req, $res, $args){
		$post = json_decode(file_get_contents('php://input'));
		$result = array(
			"code"=> 400,
			"message"=> "FAILED",
			"data"=> array(),
		);

		if (isset($post)) {
			$image = $post->base_string;
	    $filename = $post->filename;
	    $code = $post->code . '_';

			// file extension
			$file_extension = pathinfo($filename, PATHINFO_EXTENSION);
			$file_extension = strtolower($file_extension);
			$newfilename = $code . time() . ".". $file_extension;
	    $realImage = base64_decode($image);
			$location = dirname(__FILE__, 3) . '/upload/'. $post->code .'/'. $newfilename;

			// move_uploaded_file($realImage, $location);
	    if(file_put_contents($location, $realImage)){
				$result = array(
					"code"=> 200,
					"message"=> "OK",
					"data"=> array(array("filename"=> $newfilename )),
				);
	    }
		}else{
			$result = $this->base->error_empty();
		}
		return $this->base->renderJSON($res, $result);
	}

	function params($req, $res, $args){
		$result = $this->base->db_select("tb_params", "*");
		return $this->base->renderJSON($res, $result);
	}

	function params_id($req, $res, $args){
		$data = $req->getParsedBody();
		$keys = $data['par_keys'];

		$result = $this->base->db_select_where("tb_params", "*", array("prm_name"=>$keys));
		return $this->base->renderJSON($res, $result);
	}

	function params_update($req, $res, $args){
		$data = $req->getParsedBody();
		$keys = $data['prm_name'];

		$result = $this->base->db_update("tb_params", $data, array("prm_name"=>$keys));
		return $this->base->renderJSON($res, $result);
	}

	


	function menus($req, $res, $args){
		$result = $this->base->db_execute("SELECT * FROM tb_menu ORDER BY mn_sort ASC");
		return $this->base->renderJSON($res, $result);
	}

	function menus_id($req, $res, $args){
		$code = $args['code'];
		$result = $this->base->db_select_where("tb_menu", "*", array("mn_id"=>$code));
		return $this->base->renderJSON($res, $result);
	}

	function menus_update($req, $res, $args){
		$data = $req->getParsedBody();
		$keys = $data['mn_id'];

		$result = $this->base->db_update("tb_menu", $data, array("mn_id"=>$keys));
		return $this->base->renderJSON($res, $result);
	}

	

}

?>