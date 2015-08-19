<?php
use Phalcon\Mvc\Router;

$router = new Router();

$router->add("/", array(
		'namespace' => 'App\Controllers\Index',
		'controller' => 'Index',
		'action' => 'index'
));

return $router;