<?php

require 'Controllers' . DIRECTORY_SEPARATOR . 'BookController.php';
require 'Router.php';
require 'functions.php';
require 'Database' . DIRECTORY_SEPARATOR . 'DatabaseConnection.php';
require 'Database' . DIRECTORY_SEPARATOR . 'QueryBuilder.php';

error_reporting(0);

$uriPrefix = "/Pentalog-Internship/Homework2/";
$lenUriPrefix = strlen($uriPrefix);

$uri = explode('?', $_SERVER['REQUEST_URI'])[0];
if (substr($uri, 0, $lenUriPrefix) == $uriPrefix) {
  $uri = substr($uri, $lenUriPrefix);
}

$router = new Router();
$router->setRoutes(require 'routes.php');

try {
  $router->direct($uri);
} catch (Exception $exception) {
  if ($exception->getMessage() == '404') {
    require './Errors/404.error.php';
  } else if ($exception->getMessage() == '400') {
    require './Errors/400.error.php';
  }
}
