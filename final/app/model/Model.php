<?php
namespace app\model;

use \PDO;

class Model
{
  protected $_dbconn;
  protected $_guid;

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

  public function register($user_name, $user_email, $user_pass)
  {
    try
    {
      $stmt = $this->_dbconn->prepare('INSERT INTO users
        (user_name, user_email, user_pass) VALUES
        (:uname, :uemail, :upass)');

      $stmt->bindParam(':uname', $user_name);
      $stmt->bindParam(':uemail', $user_email);
      $stmt->bindParam(':upass', $user_pass);

      $stmt->execute();
    }
    catch (PDOException $e)
    {
      echo '<b>Error:</b> ' . $e->getMessage() . '<br />';
    }

  }

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

  public function __destruct()
  {
    $this->_dbconn = null;
  }

}
?>
