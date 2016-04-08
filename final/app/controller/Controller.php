<?php
namespace app\controller;

abstract class Controller
{
  // Remove potentially malicious code or tags from user input
  public function sanitizeString($string)
  {
    $string = strip_tags($string);
    $string = htmlentities($string);
    $string = stripslashes($string);
    return $string;
  }
}

?>
