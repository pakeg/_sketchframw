<?php

namespace engine\services;

use engine\services\AbstractProvider;
use engine\core\view\View;

class ViewProvider extends AbstractProvider
{
	public $serviceName = 'view';

	public function init()
	{
		$view = new View();

		$this->di->set($this->serviceName, $view);
	}

}