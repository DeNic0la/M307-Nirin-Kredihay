<?php
require 'core/bootstrap.php';

$routes = [
	'/' => 'WelcomeController@index',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');