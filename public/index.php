<?php
require __DIR__ . '../../vendor/autoload.php';

$route = \PlugRoute\RouteFactory::create();

$route->get('/', 'App\Controllers\HomeController@index');

$route->on();