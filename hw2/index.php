<?php
use app\controller\CarController;
use app\model\CarModel;
use app\view\CarView;

include_once('autoloadFunction.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Instantiate the car model
$car = new CarModel();

// Set the properties
$car->setMake('Ford');
$car->setModel('Taurus');
$car->setYear('2014');

$car2 = new CarModel();
$car2->setMake('Chevy');
$car2->setModel('Malibu');
$car2->setYear('2012');

// Call the save to store the record in the session
$car->save();
$car2->save();

//session_unset();

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
/*
echo '<hr>';
echo '<b>$_SERVER["REQUEST_METHOD"]</b> --> ';
echo $_SERVER['REQUEST_METHOD'];

$obj = new CarController;
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
  $obj->get();
}
else
{
  $obj->post();
}*/
?>
