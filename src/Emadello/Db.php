<?php

namespace Emadello;

use Emadello\Config;
use \PDO;

class Db {

  private $config;
  public $con;

  function __construct() {

    $this->config = new Config();

		// Database Connection
		$stmt = "mysql:dbname=".$this->config::dbname.";host=".$this->config::dbhost.";port=".$this->config::dbport.";charset=utf8";
		$this->con = new PDO($stmt, $this->config::dbuser, $this->config::dbpass);
		$this->con->exec("set names utf8");
		$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}

}

?>
