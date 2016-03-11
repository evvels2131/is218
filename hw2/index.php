<?php
use app\controller\CarController;
use app\model\CarModel;

include_once('autoloadFunction.php');

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Instantiate the car model
$carm = new CarModel;

$array = $_SESSION;

//session_unset();

// Debug information
echo '<h1>Debugging information</h1>';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

echo '<br />';
echo '<b>$_SERVER["REQUEST_METHOD"]</b> --> ';
echo $_SERVER['REQUEST_METHOD'];

echo '<pre>';
if (!empty($_POST))
{
  print_r($_POST);
}
echo '</pre>';

echo '<b>print_r($_GET)</b> --> ';
print_r($_GET);
echo '<hr>';

///////////////////////////////

$carController = new CarController;
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
  if (!empty($_GET['id']))
  {
    $id = $_GET['id'];
    $array = $_SESSION[$id];

    // Get details of a single car
    $carController->get($array);
  }
  else
  {
    // Get table with cars
    $carController->get($array);
  }
}
else
{
  $carController->post();
}
?>
