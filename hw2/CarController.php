<?php
include_once('autoloadFunction.php');

// CarController
class CarController
{
  // Save a car if post request
  public function post()
  {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];

    $car = new CarModel;

    $car->setMake($make);
    $car->setModel($model);
    $car->setYear($year);

    $car->save();
  }

  // Display a form if get request
  public function get()
  {
    $make = InputField::newInputField('text', 'make', 'Make');
    $model = InputField::newInputField('text', 'model', 'Model');
    $year = InputField::newInputField('text', 'year', 'Year');
    $submit = InputField::newInputField('submit', '', 'Submit');

    $form = new Form('index.php', 'POST');
    $form->addNewInput($make);
    $form->addNewInput($model);
    $form->addNewInput($year);
    $form->addNewInput($submit);

    echo $form->getForm();
  }
}
?>
