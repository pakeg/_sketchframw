<?php

namespace engine\services;

use engine\services\AbstractProvider;
use engine\core\config\Config;

class ConfigProvider extends AbstractProvider
{
	public $serviceName = 'config';

	public function init()
	{
		$config['app'] = Config::file('app');
        $config['db'] = Config::file('db');

		$this->di->set($this->serviceName, $config);
	}

}