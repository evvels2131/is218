<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Instantiate the car model
$car = new CarModel;

// Set the properties
$car->setMake('Ford');
$car->setModel('Taurus');
$car->setYear('2014');

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
  private $_year;

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

  public function getYear()
  {
    return $this->_year;
  }

  public function setYear($newYear)
  {
    $this->_year = $newYear;
  }
}

// CarView Class
class CarView
{
  public function __construct($car)
  {
    echo 'Make: ' . $car->getMake() . '<br />';
    echo 'Model: ' . $car->getModel() . '<br />';
    echo 'Year: ' . $car->getYear() . '<br />';
  }
}

// CarController
class CarController
{
  // Save a car if post request
  public function post()
  {
    $make = $_POST['make'];
    $model = $_POST['model'];

    $car = new CarModel;

    $car->setMake = $make;
    $car->setEngine = $engine;

    $car->save();
  }

  // Display a form if get request
  public function get()
  {
    $make = InputField::newInputField('text', 'make', 'Make');
    $model = InputField::newInputField('text', 'model', 'Model');
    $submit = InputField::newInputField('submit', '', 'Submit');

    $form = new Form('index.php', 'POST');
    $form->addNewInput($make);
    $form->addNewInput($model);
    $form->addNewInput($submit);
  }
}

// InputField Class
class InputField
{
  public static function newInputField($type, $name = "", $value)
  {
    if (empty($name))
    {
      $input = '<input type="' . $type . '" value="' . $value .  '">';
    }
    else {
      $input = '<input type="' . $type . '" name="' . $name . '" value="' . $value .  '">';
    }

    return $input;
  }
}

// Form Class
class Form
{
  private $_action;
  private $_method;
  private $_formHeader;
  private $_form;

  public function __construct($action, $method)
  {
    $this->_action = $action;
    $this->_method = $method;
    $this->_formHeader = '<form action="' . $this->_action . '" method="' . $this->_method . '">';
  }

  public function addNewInput($inputItem)
  {
    $this->_form[] = $inputItem;
  }

  public function getForm()
  {
    $formHTML = $this->_formHeader;
    foreach ($this->_form as $inputItem)
    {
      $formHTML .= $inputItem . '<br />';
    }
    $formHTML .= '</form>';

    return $formHTML;
  }
}

// Link Class
class Link
{
  public static function newLink($title, $href, $target)
  {
    $link = '<a href="' . $href . '" target="' . $target . '" title="' . $title . '"';

    return $link;
  }
}
?>
