<?php 


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;


/*
========================================================================================================================
AUTHORIZATON
========================================================================================================================
*/

class Auth {


  public static function instance(){
    $bmw = function (Request $request, RequestHandler $handler) {
	  	$app = AppFactory::create();
      // Example: Check for a specific header before proceeding

      // $auth = $request->getHeaderLine('Authorization');
      // $headers = $request->getHeaders();
      $data = array(
      	'status'	=> false,
      	'code'		=> 401,
      	'message' => "Unauthorized",
      	'data'		=> []
      );

      $auth = $request->getHeaderLine('Authorization');
      if (!$auth) {
        // Short-circuit and return a response immediately
        $response = $app->getResponseFactory()->createResponse();
        $response->getBody()->write(json_encode($data));
        
        return $response
          ->withHeader('Content-Type', 'application/json')
          ->withStatus(401);
      }else{
        // check auth
        $hash = "Basic " . base64_encode("hmauser2024:testhma123!");
        if ($auth != $hash) {
          $response = $app->getResponseFactory()->createResponse();
          $response->getBody()->write(json_encode($data));
          
          return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(401);
        }else{
          return $handler->handle($request);
        }
      }
      // Proceed with the next middleware
    };
    return $bmw;
  }


}




?>

