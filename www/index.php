<?php

require __DIR__.'/../vendor/autoload.php';
require '../helpers.php';

use Framework\ApplicationSettings;
use Framework\Router;

$router = new Router;
$config = new ApplicationSettings;

require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->route($uri);
