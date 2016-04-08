<?php
namespace app\model;

use \PDO;

class Database
{
  const DB_USER     = 'root';
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
      $stmt = $this->_dbconn->prepare('INSERT INTO users_is218 (email, fname,
        lname, password) VALUES (:email, :fname, :lname, :password)');

      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':fname', $fname);
      $stmt->bindParam(':lname', $lname);
      $stmt->bindParam(':password', $pass);

      $stmt->execute();
    }
    catch (PDOException $e)
    {
      echo 'Database error: ' . $e->getMessage() . '<br />';
      die();
    }
  }

  // User login
  public function userLogin($email, $pass)
  {
    try
    {
      $stmt = $this->_dbconn->prepare('SELECT * FROM users_is218 WHERE
        email=:email AND password=:password LIMIT 1');

      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':password', $pass);

      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($stmt->rowCount() > 0)
      {
        //echo $row['password'];
        session_start();
        $_SESSION['user_session'] = $row['email'];
        $_SESSION['user_fname']   = $row['fname'];
        $_SESSION['user_lname']   = $row['lname'];
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
        }*/
      }
      else
      {
        echo 'Incorrect password and email. Please try again.';
      }
    }
    catch (PDOException $e)
    {
      echo 'Database error: ' . $e->getMessage() . '<br />';
      die();
    }
  }



  // User login
  public function login($username, $email, $password)
  {
    try
    {
      $stmt = $this->_dbconn->prepare('SELECT * FROM users WHERE
        user_name=:uname OR user_email=:umail LIMIT 1');

      $stmt->execute(array(':uname' => $uname, ':umail' => $umail));

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($stmt->rowCount() > 0)
      {
        if (password_verify($upass, $row['user_pass']))
        {
          $_SESSION['user_session'] = $row['user_id'];
          $_SESSION['user_name'] = $row['user_name'];

          return true;
        }
        else
        {
          return false;
        }
      }
    }
    catch (PDOException $e)
    {
      echo '<b>Error:</b> ' . $e->getMessage() . '<br />';
    }
  }



  public function __destruct()
  {
    $this->_dbconn = null;
  }

}
?>
