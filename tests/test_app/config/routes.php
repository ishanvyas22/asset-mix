<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::reload();

$routes->scope('/', function (RouteBuilder $routes) {
    $routes->fallbacks(DashedRoute::class);
});
