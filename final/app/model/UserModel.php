<?php

namespace app\model;

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

  public function setLastName($lastName);
  {
    $this->_lname = $lastName;
  }
}


?>
