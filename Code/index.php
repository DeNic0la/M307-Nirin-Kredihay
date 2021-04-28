<?php
require 'core/bootstrap.php';

$routes = [
    '/' => 'HomeController@show',
	'/404' => 'SiteNotFoundController@show',
    '/create' => 'CreateController@show',
];

$db = [
	'name'     => 'tasklist',
	'username' => 'root',
	'password' => '',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');