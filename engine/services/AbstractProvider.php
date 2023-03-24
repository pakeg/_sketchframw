<?php

namespace engine\services;

use engine\di\Di; 

abstract class AbstractProvider
{
	/**
	* @var class \engine\di\Di;	
	*/
	protected $di;
	
	public function __construct(Di $di)
	{
		$this->di = $di;
	}

	abstract function init();
}