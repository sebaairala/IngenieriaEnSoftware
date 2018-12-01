<?php
error_reporting(-1);
ini_set('display_errors', 1);
include "class/authenticator_factory.php";
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$app->put("/user", function ($request, $response) {
  $userInstance = AuthenticatorFactory::Create("userupdate");
  $userInstance->SetValues("user", $request->getParsedBody()['user']);
  $userInstance->SetValues("password", $request->getParsedBody()['password']);
  $userInstance->SetValues("email", $request->getParsedBody()['email']);
  $userInstance->SetValues("name", $request->getParsedBody()['name']);

  $data = array( 'status' => false);
  if($userInstance->ValidateInputData())
  {
    $data = $userInstance->ValidateData();
  }
  return $response->withJson($data);
});

$app->post("/user", function ($request, $response) {
    $userInstance = AuthenticatorFactory::Create("usercreate");
  	$userInstance->SetValues("user", $request->getParsedBody()['user']);
    $userInstance->SetValues("password", $request->getParsedBody()['password']);
    $userInstance->SetValues("email", $request->getParsedBody()['email']);
    $userInstance->SetValues("name", $request->getParsedBody()['name']);

    $data = array( 'status' => false);
  	if($userInstance->ValidateInputData())
    {
      $data = $userInstance->ValidateData();
    }
  	return $response->withJson($data);
});

/*$app->post("/objeto", function ($request, $response) {
    $book_isbn = $request->getParsedBody()['test'];
    return $response->withJson($book_isbn);
});
$app->get('/objeto', function (Request $request, Response $response, array $args)
{
	$user = $args['user'];
	$password = $args['password'];
  $loginInstance = AuthenticatorFactory::Create("login");
	$loginInstance->SetValues("user", $user);
  $loginInstance->SetValues("password", $password);
  $data = array( 'status' => false);
	if($loginInstance->ValidateInputData())
  {
    $data = $loginInstance->ValidateData();
  }
	return $response->withJson($data);
});
$app->get('/objeto/{id}', function (Request $request, Response $response, array $args)
{
	$id = $args['id'];
  $loginInstance = AuthenticatorFactory::Create("login");
	$loginInstance->SetValues("user", $user);
  $loginInstance->SetValues("password", $password);
  $data = array( 'status' => false);
	if($loginInstance->ValidateInputData())
  {
    $data = $loginInstance->ValidateData();
  }
	return $response->withJson($data);
});
*/
$app->get('/login/{user}/{password}', function (Request $request, Response $response, array $args)
{
	$user = $args['user'];
	$password = $args['password'];
  $loginInstance = AuthenticatorFactory::Create("login");
	$loginInstance->SetValues("user", $user);
  $loginInstance->SetValues("password", $password);
  $data = array( 'status' => false);
	if($loginInstance->ValidateInputData())
  {
    $data = $loginInstance->ValidateData();
  }
	return $response->withJson($data);
});

$app->get('/token/{token}', function (Request $request, Response $response, array $args) {
	$token = $args['token'];
	$tokenInstance = AuthenticatorFactory::Create("token");
	$tokenInstance->SetValues("token", $token);
  $data = array( 'status' => false);
	if($tokenInstance->ValidateInputData())
  {
    $data = $tokenInstance->ValidateData();
  }

	return $response->withJson($data);
});
$app->run();
