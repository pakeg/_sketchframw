<?php

namespace engine\core\router;

use engine\core\router\Uri;

class Router 
{
	private $routes = [];
	private $dispatcher;
	private $host;

	public function __construct($host)
	{
		$this->host = $host;
	}

	public function add($key, $pattern, $controller, $method = 'GET')
	{
		$this->routes[$key] = [
			'pattern' => $pattern,
			'controller' => $controller,
			'method' => $method
		];
	}

	public function dispatch($method, $uri)
	{
		return $this->getDispatcher()->dispatch($method, $uri);
	}

	public function getDispatcher()
	{
		if (is_null($this->dispatcher)) :
			$this->dispatcher = new Uri();

			foreach ($this->routes as $route) :
				$this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
			endforeach;

		endif;

		return $this->dispatcher;
	}

}