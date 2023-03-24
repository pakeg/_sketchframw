<?php

namespace engine\core\router;

use engine\core\router\Route;

class Uri
{
	private $method = [
		'GET',
		'POST'
	];

	private $routes = [
		'GET' => [],
		'POST' => []
	];

	private $pattern = [
		'int' => '[0-9]+',
		'str' => '[a-zA-Z\.\-_%]+',
		'any' => '[a-zA-Z0-9\.\-_%]+',
	];

	public function register($method, $pattern, $controller)
	{
		$convert = $this->convertPattern($pattern);

		$this->routes[strtoupper($method)][$convert] = $controller;
	}

	private function convertPattern($pattern)
	{
		if (strpos($pattern, '(') === false) :
			return $pattern;
		endif;

		return preg_replace_callback('#\((\w+):(\w+)\)#', [$this, 'replacePattern'], $pattern);
	}

	private function replacePattern($matches)
	{
		return '(?<' . $matches[1] . '>' . strtr($matches[2], $this->pattern) . ')';
	}

	private function processParam($params = array())
	{
		foreach ($params as $key => $val) :

			if (is_int($key)) :
				unset($params[$key]);
			endif;

		endforeach;

		return $params;
	}

	public function addPattern($key, $pattern)
	{
		$this->pattern[$key] = $pattern;
	}

	public function dispatch($method, $uri)
	{
		$routes = $this->routes($method);
		
		if (array_key_exists($uri, $routes)):
			return new Route($routes[$uri]);
		endif;

		return $this->doDispatch($method, $uri);
	}

	private function routes($method)
	{
		return isset($this->routes[strtoupper($method)]) ? $this->routes[$method] : [];
	}

	private function doDispatch($method, $uri)
	{
		foreach ($this->routes($method) as $route => $controller) :
			$pattern = '#^' . $route . '$#s';

			if (preg_match($pattern, $uri, $params)) :

				return new Route($controller, $this->processParam($params));
			endif;
		endforeach;		
	}

}