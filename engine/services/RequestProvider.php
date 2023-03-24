<?php

namespace engine\services;

use engine\services\AbstractProvider;
use engine\core\request\Request;

class RequestProvider extends AbstractProvider
{
	public $serviceName = 'request';

	public function init()
	{
		$request = new Request();

		$this->di->set($this->serviceName, $request);
	}

}