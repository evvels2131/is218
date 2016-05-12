<?php
use app\App;

require_once('autoloadFunction.php');

$app = new App;

/* DEBUGGING INFO */

//session_unset();

echo '<hr>';
echo '<h2>Debugging Information</h2>';

if (isset($_SESSION))
{
  echo '<h4>$_SESSION</h4>';
  echo '<pre>';
  print_r($_SESSION);
  echo '</pre>';
}

if (isset($_GET))
{
  echo '<h4>$_GET</h4>';
  echo '<pre>';
  print_r($_GET);
  echo '</pre>';
}

if (isset($_SERVER['REQUEST_METHOD']))
{
  echo '<h4>$_SERVER["REQUEST_METHOD"]</h4>';
  echo '<pre>';
  echo $_SERVER['REQUEST_METHOD'];
  echo '</pre>';
}

if (isset($_POST) && !empty($_POST))
{
  echo '<h4>$_POST</h4>';
  echo '<pre>';
  print_r($_POST);
  echo '</pre>';
}
echo '<hr>';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
