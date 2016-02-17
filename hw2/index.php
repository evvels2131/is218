<?php

include_once('autoloadFunction.php');

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

    echo $form->getForm();
  }
}

// InputField Class
class InputField
{
  public static function newInputField($type, $name = "", $value)
  {
    if (empty($name))
    {
      $input = '<input type="' . $type . '" value="' . $value .  '"><br />';
    }
    else {
      $input = '<input type="' . $type . '" name="' . $name . '" value="' . $value .  '"><br />';
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
    $this->_formHeader = '<form action="' . $this->_action . '" method="' . $this->_method . '"><br />';
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

class Menu
{
  private $_menu;

  public function addMenuItem($link)
  {
    $this->_menu[] = $link;
  }

  public function getMenu()
  {
    $menuHTML = '<ul>';
    foreach ($this->_menu as $menuItem)
    {
      $menuHTML .= '<li>' . $menuItem . '</li>';
    }
    $menuHTML .= '</ul>';

    return $menuHTML;
  }
}
?>
