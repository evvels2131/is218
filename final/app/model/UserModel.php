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
  public function getId() {
    return $this->_id;
  }

  public function setId($id) {
    $this->_id = $id;
  }

  public function getEmail() {
    return $this->_email;
  }

  public function setEmail($email) {
    $this->_email = $email;
  }

  public function getPassword() {
    return $this->_password;
  }

  public function setPassword($password) {
    $this->_password = $password;
  }

  public function getFirstName() {
    return $this->_first_name;
  }

  public function setFirstName($firstName) {
    $this->_first_name = $firstName;
  }

  public function getLastName() {
    return $this->_last_name;
  }

  public function setLastName($lastName) {
    $this->_last_name = $lastName;
  }

  // Register user
  public function register()
  {
    try
    {
      $dbconn = DatabaseConnection::getConnection();

      // Add a new user to the users table
      $stmt = $dbconn->prepare('INSERT INTO users (user_id, email, first_name, last_name,
        password) VALUES (:user_id, :email, :first_name, :last_name, :password)');

      $stmt->bindParam(':user_id', $this->_id);
      $stmt->bindParam(':email', $this->_email);
      $stmt->bindParam(':first_name', $this->_first_name);
      $stmt->bindParam(':last_name', $this->_last_name);
      $stmt->bindParam(':password', $this->_password);
      $stmt->execute();

      // Log the user registration attempt
      $stmt = $dbconn->prepare('INSERT INTO registration_attempts (email, first_name,
        last_name, password) VALUES (:email, :first_name, :last_name, :password)');

      $stmt->bindParam(':email', $this->_email);
      $stmt->bindParam(':first_name', $this->_first_name);
      $stmt->bindParam(':last_name', $this->_last_name);
      $stmt->bindParam(':password', $this->_password);
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

  // User login
  public function login()
  {
    try
    {
      echo '<br />Login function: <br />';
      echo 'email: ' . $this->_email . '<br />';
      echo 'password: ' . $this->_password . '<br />';
      echo '<hr>';
      $dbconn = DatabaseConnection::getConnection();

      // Check if the email is in the database
      $stmt = $dbconn->prepare('SELECT email, user_id FROM users WHERE email=:email LIMIT 1');

      $stmt->bindParam(':email', $this->_email);
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($stmt->rowCount() > 0)
      {
        $user_id = $row['user_id'];

        $stmt = $dbconn->prepare('SELECT * FROM users WHERE email=:email AND
          password=:password LIMIT 1');

        $stmt->bindParam(':email', $this->_email);
        $stmt->bindParam(':password', $this->_password);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0)
        {
          $_SESSION['user_session'] = $row['user_id'];
          $_SESSION['user_fname']   = $row['first_name'];
          $_SESSION['user_lname']   = $row['last_name'];

          $user_id = $row['user_id'];
          $success = 'true';
        }
        else
        {
          $success = 'false';
        }

        $stmt = $dbconn->prepare('INSERT INTO login_attempts (user_id,
          success) VALUES (:user_id, :success)');

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':success', $success);
        $stmt->execute();

        if ($success == 'true') {
          return true;
        } else {
          return false;
        }
      }
    }
    catch (\PDOException $e)
    {
      echo 'Database error:' . $e->getMessage();
      return false;
      die();
    }
  }

  // Get users information
  public function getUsersInformation()
  {
    $result = array();

    try
    {
      $dbconn = DatabaseConnection::getConnection();

      $stmt = $dbconn->prepare('SELECT
        email AS `Email`,
        CONCAT_WS(\' \', first_name, last_name) AS `Full name`,
        created_at AS `Created at`
        FROM users WHERE user_id=:user_id');

      $stmt->bindParam(':user_id', $this->_id);

      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($result, $row);
      }

      return $result;
    }
    catch (\PDOException $e)
    {
      echo 'Database error: ' . $e->getMessage();
      return $result;
      die();
    }
  }

  // Get login history and attempts
  public function getLoginHistory()
  {
    $result = array();

    try
    {
      $dbconn = DatabaseConnection::getConnection();

      $stmt = $dbconn->prepare('SELECT
        attempted_at AS `Attempted at`,
        success AS `Successful`
        FROM login_attempts WHERE user_id=:user_id ORDER BY attempted_at DESC');

      $stmt->bindParam(':user_id', $this->_id);

      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($result, $row);
      }

      return $result;
    }
    catch (\PDOException $e)
    {
      return $result;
      echo 'Database error: ' . $e->getMessage();
      die();
    }
  }

  // Get all cars added by the user
  public function getUsersCars()
  {
    $result = array();

    try
    {
      $dbconn = DatabaseConnection::getConnection();

      $stmt = $dbconn->prepare('SELECT
        car_id AS `Car ID`,
        vin AS `Vin`,
        price AS `Price`,
        CONCAT_WS(\' \', make, model, year) AS `Car`,
        cond AS `Condition`,
        img_url AS `Image`,
        added_on AS `Added`
        FROM cars WHERE created_by=:user_id');
      $stmt->bindParam(':user_id', $this->_id);
      
      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($result, $row);
      }

      return $result;
    }
    catch (\PDOException $e)
    {
      echo 'Database error: ' . $e->getMessage();
      return $result;
      die();
    }
  }
}

?>
