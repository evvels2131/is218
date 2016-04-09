<?php
namespace app\model;

use app\model\Database;

class UserModel extends Model
{
  private $_fname;
  private $_lname;
  private $_email;
  private $_password;
  private $_id;

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

  public function getId()
  {
    return $this->_id;
  }

  public function setId($id)
  {
    $this->_id = $id;
  }

  // Register a new user
  public function register()
  {
    $db = new Database();

    $result = ($db->registerUser($this->_fname, $this->_lname, $this->_email,
      $this->_password)) ? true : false;

    return $result;
  }

  // Login a user
  public function login()
  {
    $db = new Database();

    $result = ($db->userLogin($this->_email, $this->_password)) ? true : false;

    return $result;
  }

  // Retrieve logging attempts
  public function getLoginAttempts()
  {
    $db = new Database();

    $result = $db->getLoginAttempts($this->_id);

    return $result;
  }
}

?>
