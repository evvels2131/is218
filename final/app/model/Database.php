<?php
namespace app\model;

use \PDO;

class Database
{
  private $_dbconn;

  public function __construct()
  {
    // Database information
    $db_user      = 'root';
    $db_password  = 'root';
    $db_host      = 'localhost';
    $db_name      = 'dblogin';

    try
    {
      $this->_dbconn = new PDO("mysql:host=$db_host;dbname=$db_name",
        $db_user, $db_password);
    }
    catch (PDOException $e)
    {
      echo '<b>Error:</b> ' . $e->getMessage() . '<br />';
    }
  }

  // User registration
  public function register($username, $email, $password)
  {
    try
    {
      $stmt = $this->_dbconn->prepare('INSERT INTO users
        (user_name, user_email, user_pass) VALUES
        (:uname, :uemail, :upass)');

      $stmt->bindParam(':uname', $username);
      $stmt->bindParam(':uemail', $email);
      $stmt->bindParam(':upass', $password);

      $stmt->execute();
    }
    catch (PDOException $e)
    {
      echo '<b>Error:</b> ' . $e->getMessage() . '<br />';
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

  // Gets all the users in the database
  public function getUsers()
  {
    try
    {
      $stmt = $this->_dbconn->prepare('SELECT * FROM users');
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e)
    {
      echo '<b>Error:</b> ' . $e->getMessage() . '<br />';
    }
  }

  // Check if user is logged in
  public function loggedin()
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

  // Log out
  public function logout()
  {
    session_destroy();
    unset($_SESSION['user_session']);
    unset($_SESSION['user_name']);
    return true;
  }

  public function __destruct()
  {
    $this->_dbconn = null;
  }

}
?>
