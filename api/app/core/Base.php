<?php

require_once('Medoo.php');
use Medoo\Medoo;

class BaseFunction{
	
  private $db;
	function __construct(){

    $this->db = new Medoo(
      [ 
        'database_type' => 'mysql',
        'server'        => 'localhost',
        'database_name' => 'db_hma',
        'username'      => 'root',
        'password'      => '',
        'error' => PDO::ERRMODE_EXCEPTION,
      ]
    );
    $this->db->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}

	public function getInfo($slim){
    $data = array(
      "server_info" => array(
        "php" => array(
          "version" => phpversion()
        ),
        "database"  => array(
          "name"    => "Medoo",
          "version" => $this->db->info()['version'],
          "driver" => $this->db->info()['driver']
        ),
        "framework" => array(
          "name"    => "Slim Framework",
          "version" => $slim['slim']
        ),
        "timestamp" => time(),
        "hash" => $this->random_string()
      )
    );
		return $data;
	}

  public function error_empty(){
    $r = array(
      "status" => false,
      "code" => 400,
      "message" => "Empty post data",
      "data" => array()
    );
    return $r;
  }

  public function error_exist(){
    $r = array(
      "status" => false,
      "code" => 400,
      "message" => "this data already exist",
      "data" => array()
    );
    return $r;
  }


  public function db_debug($table, $field = null, $where=[]){
    return $this->db->debug()->select($table, $field, $where);
  }

  public function db_execute($sql){
    $query = $this->db->query($sql);
    if($this->db->error){
      $hasil = array(
        "status" => false,
        "code" => 400,
        "message" => $this->db->lasterror,
        "data" => array(),
      );
    }else{
      $hasil = array(
        "status" => true,
        "code" => 200,
        "message" => "OK",
        "data" => $query->fetchAll(PDO::FETCH_ASSOC)
      );
    }
    return $hasil;
  }

  public function db_select($table, $field = null){
    if($field){
      $fields = $field;
    }else{
      $fields = "*";
    }
    $query = $this->db->select($table, $fields);
    if($this->db->error){
      $hasil = array(
        "status" => false,
        "code" => 400,
        "message" => $this->db->lasterror,
        "data" => array(),
      );
      return $hasil;
    }else{
      $hasil = array(
        "status" => true,
        "code" => 200,
        "message" => "OK",
        "data" => $query
      );
      return $hasil;        
    }
  }

  public function db_select_where($table, $field = null, $where=[]){
    if($field){
      $fields = $field;
    }else{
      $fields = "*";
    }
    $query = $this->db->select($table, $fields, $where);
    if($this->db->error){
      $hasil = array(
        "status" => false,
        "code" => 400,
        "message" => $this->db->lasterror,
        "data" => array(),
      );
      return $hasil;
    }else{
      $hasil = array(
        "status" => true,
        "code" => 200,
        "message" => "OK",
        "data" => $query
      );
      return $hasil;        
    }
  }

  public function db_select_count($table, $where=null){
    $result = $this->db->count($table, $where);
    return $result;
  }

  public function db_insert($table, $data){
    if ($this->db->insert($table, $data) ){
      $result = array(
        "status" => true,
        "code" => 200,
        "message"  => "OK",
        "data" => array($data),
      );
    }else{
      $result = array(
        "status" => false,
        "code" => 400,
        "message"  => $this->db->lasterror,
        "data" => array($data),
      );
    }
    return $result;
  }

  public function db_update($table, $data, $where){
    $put = $this->db->update($table, $data, $where);
    if ( $put ){
      if($put->rowCount() > 0){
        $result = array(
          "status" => true,
          "code" => 200,
          "message"  => $put->rowCount() . " data updated successfully",
          "data" => array($data),
        );
      }else{
        $result = array(
          "status" => true,
          "code" => 100,
          "message"  => "no data updated",
          "data" => array($data),
        );
      }
    }else{
      $result = array(
        "status" => false,
        "code" => 400,
        "message"  => $this->db->lasterror,
        "data" => array($data),
      );
    }
    return $result;
  }

  public function db_delete($table, $where){
    $hasil = $this->db->delete($table, $where);
    if($hasil->rowCount() > 0){
      $result = array(
        "status" => true,
        "code" => 200,
        "message"  => $hasil->rowCount() . " data(s) deleted",
        "data" => array(),
      );
    }else{
      $result = array(
        "status" => false,
        "code" => "100",
        "message"  => "no data deleted",
        "data" => array(),
      );
    }
    return $result;
  }

  public function generateSalt($cost = 13){
      $cost = (int) $cost;
      if ($cost < 4 || $cost > 31) {
          //throw new InvalidArgumentException('Cost must be between 4 and 31.');
      }
      // Get a 20-byte random string
      $rand =  random_bytes(20);
      // Form the prefix that specifies Blowfish (bcrypt) algorithm and cost parameter.
      $salt = sprintf('$2y$%02d$', $cost);
      // Append the random salt data in the required base64 format.
      $salt .= str_replace('+', '.', substr(base64_encode($rand), 0, 22));

      return $salt;
  }

  public function generatePasswordHash($password, $cost = null){
      if ($cost === null) {
          $cost = 13;
      }

      if (function_exists('password_hash')) {
          /* @noinspection PhpUndefinedConstantInspection */
          return password_hash($password, PASSWORD_DEFAULT, ['cost' => $cost]);
      }

      $salt = $this->generateSalt($cost);
      $hash = crypt($password, $salt);
      // strlen() is safe since crypt() returns only ascii
      if (!is_string($hash) || strlen($hash) !== 60) {
          throw new Exception('Unknown error occurred while generating hash.');
      }

      return $hash;
  }

  public function validatePassword($password, $hash){
    if (!is_string($password) || $password === '') {
      throw new InvalidArgumentException('Password must be a string and cannot be empty.');
    }

    if (!preg_match('/^\$2[axy]\$(\d\d)\$[\.\/0-9A-Za-z]{22}/', $hash, $matches) || $matches[1] < 4 || $matches[1] > 30) {
      throw new InvalidArgumentException('Hash is invalid.');
    }

    if (function_exists('password_verify')) {
      return password_verify($password, $hash);
    }

    $test = crypt($password, $hash);
    $n = strlen($test);
    if ($n !== 60) {
      return false;
    }
    return $this->compareString($test, $hash);
  }

  public function compareString($expected, $actual){
      if (!is_string($expected)) {
          throw new InvalidArgumentException('Expected expected value to be a string, ' . gettype($expected) . ' given.');
      }

      if (!is_string($actual)) {
          throw new InvalidArgumentException('Expected actual value to be a string, ' . gettype($actual) . ' given.');
      }

      if (function_exists('hash_equals')) {
          return hash_equals($expected, $actual);
      }

      $expected .= "\0";
      $actual .= "\0";
      $expectedLength = StringHelper::byteLength($expected);
      $actualLength = StringHelper::byteLength($actual);
      $diff = $expectedLength - $actualLength;
      for ($i = 0; $i < $actualLength; $i++) {
          $diff |= (ord($actual[$i]) ^ ord($expected[$i % $expectedLength]));
      }

      return $diff === 0;
  }

  public function getBody($object=false){
    // object
    if ($object) {
      return json_decode(file_get_contents('php://input'), true);
    }else{
      return json_decode(file_get_contents('php://input'));
    }
  }

  public function baseUrl(){
    $root=(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
    return $root;
  }

  public function base_url(){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'],
      $_SERVER['REQUEST_URI']
    );
  }

  public function format_rupiah($angka){
    $rupiah = number_format($angka,0,',','.');
    return $rupiah;
  }

  public function rupiah($value='0'){
    return "Rp. " . number_format($value);
  }

  public function tanggal($value, $format='Y-m-d'){
    return date_format(date_create($value), $format);
  }


/*
======================================================================================================================
  RETURN THE RESPONSE WITH JSON FORMAT
*/
  public function renderJSON($response, $data){
    // return $response->withJson($data, 200, JSON_NUMERIC_CHECK)->withHeader('Content-Type', 'application/json');
    $response->getBody()->write( json_encode($data, JSON_NUMERIC_CHECK) );
    return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus(200);
  }


/*
  RETURN THE RESPONSE WITH JSON FORMAT
======================================================================================================================
*/

}

?>