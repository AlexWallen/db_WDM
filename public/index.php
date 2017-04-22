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

/*$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello there, $name");

    return $response;
});
$app->run();*/

$app->get('/', function() {
    echo '<strong>Welcome to the API</strong>';
});

$app->run();










