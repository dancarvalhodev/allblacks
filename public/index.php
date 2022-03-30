<?php
require __DIR__ . '../../vendor/autoload.php';

$route = \PlugRoute\RouteFactory::create();

// Get
$route->get('/', 'App\Controllers\HomeController@index');
$route->get('/xml', 'App\Controllers\XMLController@index');

// Post
$route->post('/xml/upload', 'App\Controllers\XMLController@upload');

$route->on();