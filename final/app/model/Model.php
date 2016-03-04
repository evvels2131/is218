<?php
namespace app\model;

use app\model\Database;

class Model
{
  private $_guid;
  private $_db;

  public function __construct()
  {
    $this->_db = new Database;
  }

  public function registerNewUser($username, $email, $password)
  {
    $this->_db->register($username, $email, $password);
  }

}
?>
