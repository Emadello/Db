<?php

namespace Emadello;

use \DevCoder\DotEnv;

class Config
{
	const PATH_TO_ENV = __DIR__ . '/.env';
	protected $dbhost; // Host Name
	protected $dbport; //Port
	protected $dbuser;
	protected $dbpass;
	protected $dbname;

	public function __construct()
	{
		$dotenv = new DotEnv(self::PATH_TO_ENV);
		$dotenv->load();
		$this->updateCreds($dotenv);
	}

	protected function updateCreds($dotenv)
	{
		$this->dbhost = getenv('DBHOST');
		$this->dbport = getenv('DBPORT');
		$this->dbuser = getenv('DBUSER');
		$this->dbpass = getenv('DBPASS');
		$this->dbname = getenv('DBNAME');
	}
}
