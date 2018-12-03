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

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
$app->get('/user', function (Request $request, Response $response, array $args)
{
  $userInstance = AuthenticatorFactory::Create("user");
  $data = array( 'status' => false);
	if($userInstance->ValidateInputData())
  {
    $data = $userInstance->ValidateData();
  }
	return $response->withJson($data);
});

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
});*/

$app->post("/museum", function ($request, $response) {
    $userInstance = AuthenticatorFactory::Create("museumcreate");
  	$userInstance->SetValues("hour", $request->getParsedBody()['hour']);
    $userInstance->SetValues("name", $request->getParsedBody()['name']);
    $userInstance->SetValues("address", $request->getParsedBody()['address']);
    $userInstance->SetValues("token", $request->getParsedBody()['token']);

    $data = array( 'status' => false);
  	if($userInstance->ValidateInputData())
    {
      $data = $userInstance->ValidateData();
    }
  	return $response->withJson($data);
});

$app->get('/museum', function (Request $request, Response $response, array $args)
{
  $museumInstance = AuthenticatorFactory::Create("museum");
  $data = array( 'status' => false);
	if($museumInstance->ValidateInputData())
  {
    $data = $museumInstance->ValidateData();
  }
	return $response->withJson($data);
});

$app->post('/inventor', function (Request $request, Response $response, array $args)
{
  $inventorInstance = AuthenticatorFactory::Create("inventorcreate");
  $inventorInstance->SetValues("lastname", $request->getParsedBody()['lastname']);
  $inventorInstance->SetValues("name", $request->getParsedBody()['name']);
  $inventorInstance->SetValues("address", $request->getParsedBody()['address']);
  $inventorInstance->SetValues("token", $request->getParsedBody()['token']);
  $data = array( 'status' => false);
	if($inventorInstance->ValidateInputData())
  {
    $data = $inventorInstance->ValidateData();
  }
	return $response->withJson($data);
});

$app->get('/inventor', function (Request $request, Response $response, array $args)
{
  $inventorInstance = AuthenticatorFactory::Create("inventor");
  $data = array( 'status' => false);
	if($inventorInstance->ValidateInputData())
  {
    $data = $inventorInstance->ValidateData();
  }
	return $response->withJson($data);
});

$app->get('/invention', function (Request $request, Response $response, array $args)
{
  $loginInstance = AuthenticatorFactory::Create("invention");
  $data = array( 'status' => false);
	if($loginInstance->ValidateInputData())
  {
    $data = $loginInstance->ValidateData();
  }
	return $response->withJson($data);
});

$app->get('/inventionstate', function (Request $request, Response $response, array $args)
{
  $inventionStateInstance = AuthenticatorFactory::Create("inventionstate");
  $data = array( 'status' => false);
	if($inventionStateInstance->ValidateInputData())
  {
    $data = $inventionStateInstance->ValidateData();
  }
	return $response->withJson($data);
});

$app->get('/typeinvention', function (Request $request, Response $response, array $args)
{
  $typeInventionInstance = AuthenticatorFactory::Create("typeinvention");
  $data = array( 'status' => false);
	if($typeInventionInstance->ValidateInputData())
  {
    $data = $typeInventionInstance->ValidateData();
  }
	return $response->withJson($data);
});



$app->post('/invention', function (Request $request, Response $response, array $args)
{
  $inventorInstance = AuthenticatorFactory::Create("inventioncreate");
  $inventorInstance->SetValues("idmuseo", $request->getParsedBody()['idmuseo']);
  $inventorInstance->SetValues("idinventor", $request->getParsedBody()['idinventor']);
  $inventorInstance->SetValues("idtipo", $request->getParsedBody()['idtipo']);
  $inventorInstance->SetValues("idestado", $request->getParsedBody()['idestado']);
  $inventorInstance->SetValues("nombre", $request->getParsedBody()['nombre']);
  $inventorInstance->SetValues("enalmacendescarte", $request->getParsedBody()['enalmacendescarte']);
  $inventorInstance->SetValues("token", $request->getParsedBody()['token']);

  $data = array( 'status' => false);
	if($inventorInstance->ValidateInputData())
  {
    $data = $inventorInstance->ValidateData();
  }
	return $response->withJson($data);
});
/*
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
