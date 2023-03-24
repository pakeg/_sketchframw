<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use engine\Core;
use engine\di\Di;

try {
	$di = new Di();

	$services = require __DIR__ . '/config/services.php';

	foreach ($services as $service)	{ 
		$provider = new $service($di);
		$provider->init();
	}
	
	$core = new Core($di);
	$core->run();

} catch (\ErrorException $e) {
		echo $e->getMessage();
}
