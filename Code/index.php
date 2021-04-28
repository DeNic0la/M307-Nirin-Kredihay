<?php
require 'core/bootstrap.php';

$routes = [
    '/' => 'HomeController@show',
	'/404' => 'SiteNotFoundController@show',
    '/create' => 'CreateController@show',
    // Below Here The Routes for Logik
    '/add' => 'CreateController@validate',
];


$router = new Router($routes);
$router->run($_GET['url'] ?? '');