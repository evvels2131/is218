<?php
namespace app\view\page;

use app\view\html\HTML;
use app\view\html\InputField;
use app\view\html\Form;

class ShowCarDetailsPage extends Page
{
  public function __construct($array = '', $carID = '')
  {
    // Get the proper car in the array
    $car = $array[$carID['id']];

    // Display information about the car
    foreach ($car as $attribute => $value)
    {
      $clean = HTML::cleanAttribute($attribute);
      echo '<b>' . $clean . '</b>: ' . $value . '<br />';
    }

    $form = new Form('index.php', 'POST');
    foreach ($car as $attribute => $value)
    {
      $clean = HTML::cleanAttributeForm($attribute);
      $$clean = InputField::newInputField('text', $clean, $value);
      $form->addNewInput($$clean);
    }
    $submit = InputField::newInputField('submit', '', 'Submit');
    $form->addNewInput($submit);

    echo $form->getForm();

  }
}

?>
