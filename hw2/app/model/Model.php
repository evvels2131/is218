<?php
namespace app\model;

use app\model\CarModel;

include_once('autoloadFunction.php');

// Model Class
abstract class Model
{
  private $_guid;

  public function __construct($guid = "")
  {
    // Start the session
    if (!isset($_SESSION))
    {
      session_start();
    }

    // Check if guid passed
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
    // Saves the model into the session
    $_SESSION[$this->_guid] = (array) $this;
  }
}
?>
