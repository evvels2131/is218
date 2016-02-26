<?php
namespace app\view\page;

use app\view\html\HTML;
use app\view\html\InputField;
use app\view\html\Form;
use app\view\html\Heading;

class ShowCarDetailsPage extends Page
{
  public function __construct($array = '', $carID = '')
  {
    // Get the proper car in the array
    $car = $array[$carID['id']];

    echo Heading::newHeading('h1', 'Car Details');

    // Display information about the car
    foreach ($car as $attribute => $value)
    {
      $clean = HTML::cleanAttribute($attribute);
      echo '<b>' . $clean . '</b>: ' . $value . '<br />';
    }

    echo Heading::newHeading('h2', 'Edit the car below');
    $form = new Form('index.php', 'POST');
    foreach ($car as $attribute => $value)
    {
      $clean = HTML::cleanAttributeForm($attribute);
      if ($clean == 'guid')
      {
        break;
      }
      else
      {
        $$clean = InputField::newInputField('text', $clean, $value);
        $form->addNewInput($$clean);
      }
    }
    $submit = InputField::newInputField('submit', '', 'Save');
    $form->addNewInput($submit);

    echo $form->getForm();

  }
}

?>
