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
    // Get header
    echo parent::getHeader('Car Details');

    // Get the proper car in the array
    $car = $array[$carID['id']];

    echo Heading::newHeading('h1', 'Car Details');

    // Display information about the car
    foreach ($car as $attribute => $value)
    {
      $clean = HTML::cleanAttribute($attribute);
      echo '<b>' . $clean . '</b>: ' . $value . '<br />';
    }

    echo Heading::newHeading('h2', 'Edit or delete the car below');

    $form = new Form('index.php', 'POST');
    foreach ($car as $attribute => $value)
    {
      $clean = HTML::cleanAttribute($attribute, 'false');

      if ($clean == 'guid')
      {
        // Disable the GUID input field so it cannot be edited
        $$clean = InputField::newInputField('text', $clean, $value, 'readonly');
        $form->addNewInput($$clean);
      }
      else
      {
        // If not a GUID input field, allow for editing
        $$clean = InputField::newInputField('text', $clean, $value);
        $form->addNewInput($$clean);
      }
    }
    $save   = InputField::newInputField('submit', 'save', 'Save');
    $delete = InputField::newInputField('submit', 'delete', 'Delete');
    $form->addNewInput($save);
    $form->addNewInput($delete);

    echo $form->getForm();

    // Get footer
    echo parent::getFooter();
  }
}

?>
