<?php
require __DIR__ . '../../vendor/autoload.php';
session_start();
$route = \PlugRoute\RouteFactory::create();

// Get
$route->get('/', 'App\Controllers\HomeController@index');
$route->get('/xml', 'App\Controllers\XMLController@index');
$route->get('/insert_form', 'App\Controllers\PersonController@index');
$route->get('/index_update', 'App\Controllers\PersonController@index_update');
$route->get('/index_update_form/{id}', 'App\Controllers\PersonController@index_update_form');

// Post
$route->post('/xml/upload', 'App\Controllers\XMLController@upload');
$route->post('/insert', 'App\Controllers\PersonController@insert');

$route->on();