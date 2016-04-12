<?php
namespace app\model;

use \PDO;

class Database
{
  /*const DB_USER     = 'root';
  const DB_PASSWORD = 'root';
  const DB_HOST     = 'localhost';
  const DB_NAME     = 'is218';

  private $_dbconn;

  public function __construct()
  {
    try
    {
      $this->_dbconn = new PDO('mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME,
        self::DB_USER, self::DB_PASSWORD, array(PDO::ATTR_PERSISTENT => true));
      $this->_dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e)
    {
      echo 'Error: ' . $e->getMessage() . '<br />';
      die();
    }

  }

  // User registration
  public function registerUser($fname, $lname, $email, $pass)
  {
    try
    {
      //$stmt = $this->_dbconn->prepare('INSERT INTO users_is218 (email, fname,
        //lname, password, signup_date) VALUES (:email, :fname, :lname, :password, NOW())');

      $stmt = $this->_dbconn->prepare('INSERT INTO users (email, first_name, last_name,
        password) VALUES (:email, :fname, :lname, :password)');

      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':fname', $fname);
      $stmt->bindParam(':lname', $lname);
      $stmt->bindParam(':password', $pass);

      $stmt->execute();

      // Log the registration attempt
      $stmt = $this->_dbconn->prepare('INSERT INTO registration_attempts (email, first_name,
        last_name, password, successful) VALUES (:email, :fname, :lname, :password, :successful)');

      $success = 'yes';

      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':fname', $fname);
      $stmt->bindParam(':lname', $lname);
      $stmt->bindParam(':password', $pass);
      $stmt->bindParam(':successful', $success);

      $stmt->execute();

      return true;
    }
    catch (\PDOException $e)
    {
      echo 'Database error: ' . $e->getMessage() . '<br />';

      return false;

      die();
    }
  }

  // User login
  public function userLogin($email, $pass)
  {
    try
    {
      $stmt = $this->_dbconn->prepare('SELECT * FROM users WHERE
        email=:email AND password=:password LIMIT 1');

      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':password', $pass);

      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($stmt->rowCount() > 0)
      {
        $_SESSION['user_session'] = $row['user_id'];
        $_SESSION['user_fname']   = $row['first_name'];
        $_SESSION['user_lname']   = $row['last_name'];

        // Log the attempt
        $success = 'yes';
        $user_id = $row['user_id'];

        $stmt = $this->_dbconn->prepare('INSERT INTO login_attempts (successful, user_id)
          VALUES (:successful, :user_id)');

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':successful', $success);

        $stmt->execute();

        return true;
        /*if (password_verify($pass, $row['password']))
        {
          // Read more here: http://php.net/manual/en/function.password-verify.php
          session_start();
          $_SESSION['user_session'] = $row['email'];
          $_SESSION['user_fname'] = $row['fname'];
          $_SESSION['user_lname'] = $row['lname'];
          echo 'true';
          return true;

        }
        else
        {
          echo 'false';
          return false;
        }
      }
      else
      {
        //echo 'Incorrect password and email. Please try again.';

        return false;
      }
    }
    catch (\PDOException $e)
    {
      echo 'Database error: ' . $e->getMessage() . '<br />';
      die();
    }
  }

  // Get users login attempts
  public function getLoginAttempts($user_id)
  {
    $result = array();

    try
    {
      $stmt = $this->_dbconn->prepare('SELECT attempted_at FROM login_attempts WHERE
        user_id=:user_id ORDER BY attempted_at DESC');

      $stmt->bindParam(':user_id', $user_id);

      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
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

  // Get users information
  public function getUserInformation($user_id)
  {
    $result = array();

    try
    {
      $stmt = $this->_dbconn->prepare('SELECT first_name, last_name, email FROM
        users WHERE user_id=:user_id');

      $stmt->bindParam(':user_id', $user_id);

      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        array_push($result, $row);
      }

      return $result;
    }
    catch (\PDOException $e)
    {
      //return $result;
      echo 'Database error: ' . $e->getMessage();
      die();
    }
  }

  // Add new car
  public function addNewCar($vin, $condition, $price, $user_id)
  {
    try
    {
      $stmt = $this->_dbconn->prepare('INSERT INTO cars (vin_id, price, cond, created_by)
        VALUES (:vin, :price, :condition, :created_by)');

      $stmt->bindParam(':vin', $vin);
      $stmt->bindParam(':price', $price);
      $stmt->bindParam(':condition', $condition);
      $stmt->bindParam(':created_by', $user_id);

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

  // Get all cars that a particular user has added
  public function getUserCars($user_id)
  {
    $result = array();

    try
    {
      $stmt = $this->_dbconn->prepare('SELECT img_url AS `Image`, vin_id AS `Vin`, price AS `Price`,
        cond AS `Condition` FROM cars WHERE created_by=:user_id');

      $stmt->bindParam(':user_id', $user_id);

      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
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

  // Get all cars from the database
  public function getCars()
  {
    $result = array();

    try
    {
      $stmt = $this->_dbconn->prepare('SELECT c.img_url AS `Image`, c.vin_id AS `Vin`, c.price AS `Price`,
        c.cond AS `Condition`, u.user_id,
        CONCAT_WS(\', \', u.first_name, u.last_name) AS `Salesman` FROM cars c LEFT JOIN
        users u ON c.created_by = u.user_id');

      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
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

  // Get information about a particular car
  public function getCarDetails($vin_id)
  {
    $result = array();

    try
    {
      $stmt = $this->_dbconn->prepare('SELECT c.img_url AS `Image`, c.vin_id AS `Vin`, c.price AS `Price`,
        c.cond AS `Condition`, CONCAT_WS(\', \', u.first_name, u.last_name) AS
        `Salesman` FROM cars c LEFT JOIN users u ON c.created_by = u.user_id WHERE vin_id=:vin_id');

      $stmt->bindParam(':vin_id', $vin_id);

      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
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

  public function __destruct()
  {
    $this->_dbconn = null;
  }*/
}
?>
