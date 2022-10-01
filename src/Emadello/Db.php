<?php

namespace Emadello;

use Emadello\Config;
use \PDO;

class Db
{
  private $config;
  public $con;
  public $connected = false;
  function __construct()
  {
    $this->config = new Config();
  }
  public function con()
  {
    try {
      if (!$this->connected) {
        // Database Connection
        $stmt = "mysql:dbname=" . $this->config->dbname . ";host=" . $this->config->dbhost . ";port=" . $this->config->dbport . ";charset=utf8";
        $this->con = new PDO($stmt, $this->config->dbuser, $this->config->dbpass);
        $this->con->exec("set names utf8");
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connected = true;
        if (isset($_SESSION['db_error'])) unset($_SESSION['db_error']);
      }
      return $this->con;
    } catch (\PDOException $e) {
      $_SESSION['db_error'] = $e->getMessage();
    }
  }
}
