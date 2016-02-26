<?php
session_start();

use app\controller\CarController;
use app\controller\HomePageController;
use app\controller\ShowCarsPageController;
use app\controller\AddCarPageController;
use app\controller\ShowCarDetailsController;
use app\view\html\Link;

require_once('autoloadFn.php');

/////////////////////////////////////
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//////////////////////////////////////
echo Link::newLink('Home', 'index.php', '_self');
echo '<br />';
echo Link::newLink('Add a new car', 'index.php?page=addcar', '_self');
echo '<br />';
echo Link::newLink('Show all cars', 'index.php?page=showcars', '_self');
echo '<br />';
echo '<hr>';

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
  // Store the session array
  isset($_SESSION) ? $session_array = $_SESSION : $session_array = '';

  // Store the get array
  isset($_GET) ? $get_array = $_GET : $get_array = '';

  if (!empty($_GET))
  {
    $requestedPage = $_GET['page'];

    switch ($requestedPage)
    {
      case 'addcar':
        $addCarPageController = new AddCarPageController;
        //$addcarspageController->get();
        break;
      case 'showcars':
        $showCarsPageController = new ShowCarsPageController($session_array);
        break;
      case 'car':
        $showCarDetails = new ShowCarDetailsController($session_array, $get_array);
        break;
    }
  }
  else
  {
    $homePageController = new HomePageController;
  }
}
else
{
  // Store the post array
  isset($_POST) ? $post_array = $_POST : $post_array = '';

  $carController = new CarController;
  $carController->post($post_array);
}

//session_unset();

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
