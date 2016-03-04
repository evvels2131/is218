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

  public function login($username, $email, $password)
  {
    $this->_db->login($username, $email, $password);
  }

  // Check if user is logged in
  public function is_loggedin()
  {
    if (isset($_SESSION['user_session']))
    {
      return true;
    }
    else
    {
      return false;
    }
  }

}
?>
