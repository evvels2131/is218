<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Instantiate the car model
$car = new CarModel;

// Set the properties
$car->setMake('Ford');
$car->setModel('Taurus');

// Call the save to store the record in the session
$car->save();

//session_unset();

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

// Model Class
class Model
{
  private $_guid;

  public function __construct()
  {
    // Start the session
    session_start();

    // Create a unique ID to identify the record
    $this->_guid = uniqid();
  }

  public function save()
  {
    // Saves the model into the session
    $_SESSION[$this->_guid] = (array) $this;
  }
}

// CarModel Class
class CarModel extends Model
{
  private $_make;
  private $_model;

  // Getters and setters
  public function getMake()
  {
    return $this->_make;
  }

  public function setMake($newMake)
  {
    $this->_make = $newMake;
  }

  public function getModel()
  {
    return $this->_model;
  }

  public function setModel($newModel)
  {
    $this->_model = $newModel;
  }
}

// CarView Class
class CarView
{
  public function __construct($car)
  {
    echo 'Make: ' . $car->getMake() . '<br />';
    echo 'Model: ' . $car->getModel() . '<br />';
  }
}

// CarController
class CarController
{
  public function post()
  {
    $make = $_POST['make'];
    $model = $_POST['model'];

    $car = new CarModel;

    $car->setMake = $make;
    $car->setEngine = $engine;

    $car->save();
  }

}
?>
