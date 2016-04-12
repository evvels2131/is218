<?php
namespace app\model;

use app\model\Database;
use app\model\DatabaseConnection;
use \PDO;

class UserModel extends Model
{
  private $_id;
  private $_email;
  private $_password;
  private $_first_name;
  private $_last_name;

  public function __construct($id = '')
  {
    if (!empty($id)) {
      $this->_id = $id;
    } else {
      $this->_id = uniqid('user_', false);
    }

    // Create tables for the user if not yet created
    try
    {
      $dbconn = DatabaseConnection::getConnection();

      // Create user table
      $stmt = $dbconn->prepare('CREATE TABLE IF NOT EXISTS users (
        user_id CHAR(18) NOT NULL,
        email VARCHAR(50) NOT NULL,
        first_name VARCHAR(50) DEFAULT NULL,
        last_name VARCHAR(50) DEFAULT NULL,
        password VARCHAR(50) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY(user_id)
      )ENGINE=InnoDB');
      $stmt->execute();

      // Create login attempts table for user
      $stmt = $dbconn->prepare('CREATE TABLE IF NOT EXISTS login_attempts (
        la_id INT(100) NOT NULL AUTO_INCREMENT,
        attempted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        success VARCHAR(5) NOT NULL,
        user_id CHAR(18) NOT NULL,
        PRIMARY KEY(la_id),
        FOREIGN KEY fk_user (user_id)
        REFERENCES users(user_id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
      )ENGINE=InnoDB');
      $stmt->execute();

      // Create a table for registration attempts
      $stmt = $dbconn->prepare('CREATE TABLE IF NOT EXISTS registration_attempts (
        ra_id INT(100) NOT NULL AUTO_INCREMENT,
        email VARCHAR(50) NOT NULL,
        first_name VARCHAR(50) DEFAULT NULL,
        last_name VARCHAR(50) DEFAULT NULL,
        password VARCHAR(50) NOT NULL,
        attempted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY(ra_id)
      )ENGINE=InnoDB');
      $stmt->execute();

      return true;
    }
    catch (\PDOException $e)
    {
      echo 'Database error: ' . $e->getMessage();
      return false;
      die();
    }
  }

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

  public function getUserInformation()
  {
    $db = new Database();

    $result = $db->getUserInformation($this->_id);

    return $result;
  }

  public function getUserCars()
  {
    $db = new Database();

    $result = $db->getUserCars($this->_id);

    return $result;
  }
}

?>
