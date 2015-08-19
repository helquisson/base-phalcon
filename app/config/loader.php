<?php
use Phalcon\Loader;

$loader = new Loader ();

$loader->registerNamespaces ( array (
		'App\Controllers' => '../app/controllers/',
		'App\Controllers\Index' => '../app/controllers/index/' 
) )->register ();