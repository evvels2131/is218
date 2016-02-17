<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Model Class
class Model
{
  private $_guid;

  public function __construct()
  {
    // Start the session
    session_start();

    // Create a unique ID to identify the record
    $this->_guid = uniqid();
  }

  public function save()
  {
    // Saves the model into the session
    $_SESSION[$this->_guid] = (array) $this;
  }
}

// Car Class
class Car extends Model
{
  private $_make;
  private $_model;

  // Getters and setters
  public function getMake()
  {
    return $this->_make;
  }

  public function setMake($newMake)
  {
    $this->_make = $newMake;
  }

  public function getModel()
  {
    return $this->_model;
  }

  public function setModel($newModel)
  {
    $this->_model = $newModel;
  }
}
?>
