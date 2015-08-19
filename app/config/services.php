<?php
use Phalcon\Mvc\View;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

$di = new FactoryDefault ();

$di->set ( 'db', function () use($config) {
	return new DbAdapter ( array (
			"host" => $config->database->host,
			"username" => $config->database->user,
			"password" => $config->database->password,
			"dbname" => $config->database->dbname,
			"charset" => $config->database->charset 
	) );
} );

$di->set ( 'view', function () {
	$view = new View ();
	$view->setViewsDir ( '../app/views/' );
	
	/* register template */
	$view->registerEngines ( array (
			".volt" => function ($view, $di) {
				$volt = new \Phalcon\Mvc\View\Engine\Volt ( $view, $di );
				$volt->setOptions ( array (
						'compiledPath' => '../app/cache/',
						'stat' => true,
						'compileAlways' => true 
				) );
				return $volt;
			} 
	) );
	
	return $view;
} );

$di->set ( 'url', function () {
	$url = new UrlProvider ();
	$url->setBaseUri ( '/base-phalcon/' );
	return $url;
} );

$di->set ( 'router', function () {
	return require __DIR__ . '/routes.php';
} );