<?php

namespace engine\core\router;

class Route
{
	private $controller;
	private $params;

	public function __construct($controller, $params = array())
	{
		$this->controller = $controller;
		$this->params = $params;
	}

	public function getController()
	{
		return $this->controller;
	}

	public function getParams()
	{
		return $this->params;
	}

}