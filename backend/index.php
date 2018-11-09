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
$app->run();
