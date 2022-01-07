<?php
require_once('connection.php');
require_once('routes.php');
require_once('config.php');
require_once('libs/functions.php');
require_once('libs/Route.php');

$route = new Route();
$currentRoute = $route->getCurrentRoute();

if(!$currentRoute){
  var_dump("404 Not Found");

  die();
}

$pathController = $currentRoute['use'];
$action     = $currentRoute['action'];

$classController = explode('/',$pathController);
$classController = end($classController);

require_once('Controllers/' . $pathController . '.php');

$controller = new $classController;
$controller->$action();
