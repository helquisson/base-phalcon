<?php
use Phalcon\Mvc\Application;

try {
	
	$config = require_once '../app/config/config.php';
	
	require_once '../app/config/loader.php';
	
	require_once '../app/config/services.php';
	
	$application = new Application ( $di );
	
	echo $application->handle ()->getContent ();
} catch ( \Exception $e ) {
	echo 'PhalconException: ', $e->getMessage ();
}