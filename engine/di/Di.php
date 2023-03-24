<?php

namespace engine\di;

class Di
{
	private $container = array();
	
	public function set($key, $val)
	{
		$this->container[$key] = $val;

		return $this;
	}

	public function get($key)
	{
		return $this->has($key);
	}

	public function has($key)
	{
		return isset($this->container[$key]) ? $this->container[$key] : null;
	}
	  
}