<?php

namespace engine;

use engine\core\helper\Request;

class Core
{
	private $di;
	public $router;

	public function __construct($di)
	{
		$this->di = $di;
		$this->router = $di->get('router');
	}

	public function run()
	{	
		require_once __DIR__ .'/config/routes.php'; 

		$dispatch = $this->router->dispatch(Request::getMethod(), Request::getUri());

		if (is_null($dispatch)):
			header("HTTP/1.0 404 Not Found");
			exit;
		endif;
		
		list($class, $action) = explode(':', $dispatch->getController(), 2);

		if (ENV == 'admin'):
			$class = '\\'.ENV.'\\controller\\' . $class;
		else:
			$class = '\\'.ENV.'\\core\\controller\\' . $class;
		endif;
		$params = $dispatch->getParams();
		
		call_user_func_array([new $class($this->di), $action], $params);
	}
}