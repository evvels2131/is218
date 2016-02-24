<?php
use app\controller\CarController;
use app\view\html\Link;

require_once('autoloadFn.php');

/////////////////////////////////////
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//////////////////////////////////////
$carController = new CarController;

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
  isset($_SESSION) ? $session_array = $_SESSION : $session_array = '';

  if (!empty($_GET))
  {
    $requestedPage = $_GET['page'];

    if ($requestedPage == 'about')
    {
      $carController->get($requestedPage);
    }
    else if ($requestedPage == 'addcar')
    {
      $carController->get($requestedPage);
    }
    else if ($requestedPage == 'showcars')
    {
      $carController->get($requestedPage);
    }
  }
  else
  {
    $carController->get();
  }
}
else
{
  $carController->post();
}

echo Link::newLink('Home', 'index.php', '_self');
echo '<br />';
echo Link::newLink('About', 'index.php?page=about', '_self');
echo '<br />';
echo Link::newLink('Add a new car', 'index.php?page=addcar', '_self');
echo '<br />';
echo Link::newLink('Show all cars', 'index.php?page=showcars', '_self');
echo '<br />';
//session_unset();

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
if (isset($_SESSION))
{
  echo '<br /><br /><b>$_SESSION</b><pre>';
  print_r($_SESSION);
  echo '</pre>';
}

?>
