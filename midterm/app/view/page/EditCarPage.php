<?php
namespace app\view\page;

use app\view\html\HTML;
use app\view\html\InputField;
use app\view\html\Form;
use app\view\html\Heading;
use app\view\html\Button;

class EditCarPage extends Page
{
  public function __construct($array = '', $carID = '')
  {
    // Get header
    echo parent::getHeader('Edit Car');

    // Get the proper car in the array
    $car = $array[$carID['id']];

    echo parent::alertDiv('warning', Heading::newHeading('h4', 'Edit or delete the car below'));

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
    $save   = Button::newButton('submit', 'save', 'btn-success', 'Save');
    $delete = Button::newButton('submit', 'delete', 'btn-danger', 'Delete');
    $form->addNewInput($save);
    $form->addNewInput($delete);

    echo parent::formDiv($form->getForm());

    // Get footer
    echo parent::getFooter();
  }
}



?>
