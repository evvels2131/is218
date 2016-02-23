<?php
namespace app\model;

abstract class Model
{
  private $_guid;

  public function __construct($guid = "")
  {
    // Start the session if it's not set
    if (!isset($_SESSION))
    {
      session_start();
    }

    // Check if guid passed as a parameter
    if (!empty($guid))
    {
      $this->_guid = $guid;
    }
    else
    {
      // Create a unique ID to identify the record
      $this->_guid = uniqid();
    }
  }

  public function save()
  {
    // Save the model into the session
    $_SESSION[$this->_guid] = (array) $this;
  }
}
?>
