<?php
use app\controller\CarController;
use app\view\html\Link;

require_once('autoloadFn.php');

/////////////////////////////////////
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//////////////////////////////////////
echo Link::newLink('Home', 'index.php', '_self');
echo '<br />';
echo Link::newLink('About', 'index.php?page=about', '_self');
echo '<br />';
echo Link::newLink('Add a new car', 'index.php?page=addcar', '_self');



$carController = new CarController;

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
  if (!empty($_GET))
  {
    $requestedPage = $_GET['page'];

    if ($requestedPage == 'about')
    {
      $carController->get($requestedPage);
    }
    else if ($_GET['page'] == 'addcar')
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
  // post, but will get to this soon
}








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
