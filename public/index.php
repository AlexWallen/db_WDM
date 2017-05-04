<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

require 'wells.php';
require 'transducers.php';
require 'recordings.php';
require 'rainfall.php';
require 'owners.php';
require 'location.php';

$app->run();

?>

