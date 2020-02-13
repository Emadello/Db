<?php

namespace Emadello\Db;

use \Emadello\Db\config;
use \PDO;

class db {

  private $config;
  protected $con;

  function __construct() {

    $this->config = new config();

		// Database Connection
		$stmt = "mysql:dbname=".$this->config::dbname.";host=".$this->config::dbhost.";port=".$this->config::dbport.";charset=utf8";
		$this->con = new PDO($stmt, $this->config::dbuser, $this->config::dbpass);
		$this->con->exec("set names utf8");
		$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    print_r($this->con);

	}

}

?>
