<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../vendor/bin/generated-conf/config.php';

$app = new \Slim\App;

require 'routes/career.php';
require 'routes/assignature.php';
require 'routes/note.php';

$app->run();

?>