<?php
session_start();

use app\App;

require_once('autoloadFn.php');

$app = new App;

// turn on php error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_SESSION) && !empty($_SESSION))
{
  echo '<h2>$_SESSION</h2>';
  echo '<pre>';
  print_r($_SESSION);
  echo '</pre>';
}

if (isset($_GET) && !empty($_SESSION))
{
  echo '<h2>$_GET</h2>';
  echo '<pre>';
  print_r($_GET);
  echo '</pre>';
}

echo '<b>$_SERVER["REQUEST_METHOD"] --> ' . $_SERVER['REQUEST_METHOD'];
?>
