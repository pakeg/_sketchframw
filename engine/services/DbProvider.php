<?php

namespace engine\services;

use engine\services\AbstractProvider;
use engine\core\database\Db;

class DbProvider extends AbstractProvider
{
	public $serviceName = 'db';

	public function init()
	{
		$db = new Db($this->di);

		$this->di->set($this->serviceName, $db);
	}

}