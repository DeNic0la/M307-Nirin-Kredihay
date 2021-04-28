<?php
require 'core/bootstrap.php';

$routes = [
    // Routes with Display
    '/' => 'HomeController@show',
	  '/404' => 'SiteNotFoundController@show',
    '/create' => 'CreateController@show',
    '/list' => 'ListController@show',
    '/edit' => 'EditController@show',
  
    // Below Here The Routes for Logik
    '/add' => 'CreateController@validate',
];


$router = new Router($routes);
$router->run($_GET['url'] ?? '');