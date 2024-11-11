<?php

declare(strict_types=0);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

include_once 'core/Auth.php';

include_once 'controllers/Common.php';
include_once 'controllers/Account.php';
include_once 'controllers/User.php';

return function (App $app) {
  $auth = Auth::instance();
  $comm = new Common;
  $acc = new Account;

  $app->get('/', function (Request $request, Response $response) {
    $json = json_encode(
      array("hello"=>"world"),
      JSON_PRETTY_PRINT
    );
    $response->getBody()->write($json);
    return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus(200);
  });

  $app->post('/web/login', array($acc, 'web_login'))->add($auth);

  $app->post('/base64_upload', array($comm, 'base64_upload'))->add($auth);

  $app->get('/params', array($comm, 'params'))->add($auth);
  $app->post('/params/id', array($comm, 'params_id'))->add($auth);
  $app->post('/params/update', array($comm, 'params_update'))->add($auth);

  $app->get('/menus', array($comm, 'menus'))->add($auth);
  $app->get('/menus/{code}', array($comm, 'menus_id'))->add($auth);
  $app->post('/menus/update', array($comm, 'menus_update'))->add($auth);

  $app->group('/users', function (Group $group) {
    $user = new User;
    $group->post('', array($user, 'get_user'));
    $group->post('/id', array($user, 'get_user_id'));
    $group->post('/save', array($user, 'save_user'));
    $group->post('/update', array($user, 'update_user'));
    $group->get('/delete/{code}', array($user, 'delete_user'));
  })->add($auth);


};
