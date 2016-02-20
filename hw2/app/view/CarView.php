<?php
namespace app\view;

use app\html\Table;
use app\html\InputField;
use app\html\Form;

include_once('autoloadFunction.php');

// CarView Class
class CarView extends View
{
  // Same as showCarDetails
  public function __construct($car)
  {
    echo 'Make: ' . $car->getMake() . '<br />';
    echo 'Model: ' . $car->getModel() . '<br />';
    echo 'Year: ' . $car->getYear() . '<br />';
  }

  public static function viewCars($array)
  {
    echo Table::generateTable($array);
  }

  public static function addNewCar()
  {
    $make   = InputField::newInputField('text', 'make', 'Make');
    $model  = InputField::newInputField('text', 'model', 'Model');
    $year   = InputField::newInputField('text', 'year', 'Year');
    $submit = InputField::newInputField('submit', '', 'Submit');

    $form = new Form('index.php', 'POST');
    $form->addNewInput($make);
    $form->addNewInput($model);
    $form->addNewInput($year);
    $form->addNewInput($submit);

    echo '<h3>Add a new car</h3>';
    echo $form->getForm();
  }

  public static function viewCarDetails($car)
  {
    foreach ($car as $attribute => $value)
    {
      $pos = strrpos($attribute, '_') + 1;
      $strlen = strlen($attribute) - 1;
      $cleanAttribute = ucfirst(substr($attribute, $pos, $strlen));
      echo $cleanAttribute . ': ' . $value . '<br />';
    }
  }
}

?>
