<?php
namespace app\model;

include_once('autoloadFunction.php');

// Model Class
abstract class Model
{
  private $_guid;

  public function __construct()
  {
    // Start the session
    if (!isset($_SESSION))
    {
      session_start();
    }
    
    // Create a unique ID to identify the record
    $this->_guid = uniqid();
  }

  public function save()
  {
    // Saves the model into the session
    $_SESSION[$this->_guid] = (array) $this;
  }
}
?>
