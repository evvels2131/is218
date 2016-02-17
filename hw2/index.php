<?php

// ModelClass
class Model
{
  private $_guid;

  // Start the session
  session_start();

  // Create a unique ID to identify the record
  $this->_guid = uniqid();

  public function save()
  {
    // Saves the model into the session
    $_SESSION[$this->_guid] = (array) $this;
  }
}

?>
