<?php
namespace app\model;

use app\model\Database;

class UserModel extends Model
{
  private $_fname;
  private $_lname;
  private $_email;
  private $_password;

  // Getters and setters
  public function getFirstName()
  {
    return $this->_fname;
  }

  public function setFirstName($firstName)
  {
    $this->_fname = $firstName;
  }

  public function getLastName()
  {
    return $this->_lname;
  }

  public function setLastName($lastName)
  {
    $this->_lname = $lastName;
  }

  public function getEmail()
  {
    return $this->_email;
  }

  public function setEmail($email)
  {
    $this->_email = $email;
  }

  public function getPassword()
  {
    return $this->_password;
  }

  public function setPassword($password)
  {
    $this->_password = $password;
  }

  public function register()
  {
    $db = new Database();
    $db->registerUser($this->_fname, $this->_lname, $this->_email, $this->_password);
  }
}

?>
