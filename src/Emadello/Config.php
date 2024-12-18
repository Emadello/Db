<?php

namespace Emadello;

use \PhpDevCommunity\DotEnv;
use \Composer\Factory;

class Config
{
	protected $envFile = '/.env';
	protected $projectPath;
	public $dbhost; // Host Name
	public $dbport; //Port
	public $dbuser;
	public $dbpass;
	public $dbname;

	public function __construct()
    {
        $reflection = new \ReflectionClass(\Composer\Autoload\ClassLoader::class);
        $this->projectPath = dirname($reflection->getFileName(), 3);
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
