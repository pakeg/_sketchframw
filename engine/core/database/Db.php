<?php

namespace engine\core\database;

use \PDO;

class Db 
{
	private $db;
	private $cfg;

	public function __construct($di)
	{	
		$this->cfg = $di->get('config')['db'];
		$this->connect();
	}

	private function connect()
	{
		$cfg = $this->cfg;

		$dsn = 'mysql:host='.$cfg['host'].';dbname='.$cfg['db'].';charset='.$cfg['charset'].'';

		$this->db = new PDO($dsn, $cfg['user'], $cfg['pass']);

		return $this;
	}

	public function execute($sql, $values = [])
	{ 
		$exec = $this->db->prepare($sql);

		return $exec->execute($values);
	}

	public function rows($sql, $values = [])
	{
		$query = $this->db->prepare($sql);

		$query->execute($values);

		$res = $query->fetchAll(PDO::FETCH_ASSOC);

		if ($res === false) :
			return [];
		endif;

		return $res;
	}

	public function row($sql, $values = [])
	{
		$query = $this->db->prepare($sql);

		$query->execute($values);

		$res = $query->fetch(PDO::FETCH_ASSOC);

		if ($res === false) :
			return [];
		endif;

		return $res;
	}

}