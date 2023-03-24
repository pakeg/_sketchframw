<?php

namespace engine\core\helper;

class Request
{
	public function isPost()
	{
		if ($_SERVER['REQUEST_METHOD' == 'POST']) :
			return true;

		endif;

		return false;
	}

	public function isGet()
	{
		if ($_SERVER['REQUEST_METHOD' == 'GET']) :
			return true;
			
		endif;

		return false;
	}

	public function getMethod()
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	public function getUri()
	{
		$uri = $_SERVER['REQUEST_URI'];
		$pos = strpos($uri, '?');

		if ($pos) :
			$uri = substr($uri, 0, $pos);
		endif;

		return $uri;

	}

}