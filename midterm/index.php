<?php
session_start();

use app\view\html\Link;
use app\App;

require_once('autoloadFn.php');

/////////////////////////////////////
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//////////////////////////////////////

$app = new App;



echo Link::newLink('Home', 'index.php', '_self');
echo '<br />';
echo Link::newLink('Add a new car', 'index.php?page=addcar', '_self');
echo '<br />';

/*
echo '<hr>';
echo '<h1>Debugging information</h1>';

// Request method
echo '<b>REQUEST_METHOD</b> --> ' . $_SERVER['REQUEST_METHOD'];

// post
if (!empty($_POST))
{
  echo '<br /><br /><b>$_POST</b><pre>';
  print_r($_POST);
  echo '</pre>';
}

// get
if (!empty($_GET))
{
  echo '<br /><br /><b>$_GET</b><pre>';
  print_r($_GET);
  echo '</pre>';
}

// Session
if (!empty($_SESSION))
{
  echo '<br /><br /><b>$_SESSION</b><pre>';
  print_r($_SESSION);
  echo '</pre>';
}

if (!isset($_SESSION))
{
  echo '<br /><br />SESSION NOT SET AND I DONT KNOW WHY!!';
}
*/
?>
