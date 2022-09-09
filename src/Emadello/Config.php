<?php

namespace Emadello;

use \DevCoder\DotEnv;
use \Composer\Factory;

class Config
{
	protected $envFile = '/.env';
	protected $projectPath;
	protected $dbhost; // Host Name
	protected $dbport; //Port
	protected $dbuser;
	protected $dbpass;
	protected $dbname;

	public function __construct()
	{
		$this->projectPath = dirname(\Composer\Factory::getComposerFile());
		$dotenv = new DotEnv($this->projectPath.'/'.$this->envFile);
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
