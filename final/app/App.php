<?php

namespace app;

class App
{
  public function __construct()
  {
    // Check if session is set
    isset($_SESSION) ? $session_array = $_SESSION : $session_array = '';

    echo 'test';
  }
}

?>
