<?php 

namespace engine\services;

use engine\services\AbstractProvider;
use engine\core\router\Router;

class RouterProvider extends AbstractProvider
{
	public $serviceName = 'router';

	public function init()
	{
		$router = new Router('http://cmsphp/');

		$this->di->set($this->serviceName, $router);
	}
}