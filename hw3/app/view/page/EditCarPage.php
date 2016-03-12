<?php
namespace app\view\page;

use app\view\html\HTML;
use app\view\html\InputField;
use app\view\html\Form;
use app\view\html\Heading;
use app\view\html\Button;
use app\view\html\Link;

class EditCarPage extends Page
{
  public function __construct($array = '', $carID = '')
  {
    // Get header
    echo parent::getHeader('Edit Car');

    // Get the proper car in the array
    $car = $array[$carID['id']];

    $content = parent::htmlAlertDiv('warning', Heading::newHeading('h5', 'Edit or delete the car below'));
    echo parent::htmlDiv($content, 8);

    // newInputField($type, $name, $value, $readonly, $placeholder)
    // newButton($type, $name, $class, $text)

    $form = new Form('index.php?page=editcar', 'POST');
    foreach ($car as $attribute => $value)
    {
      $clean = HTML::cleanAttribute($attribute, 'false');

      if ($clean == 'guid')
      {
        // Disable the GUID input field so it cannot be edited
        $$clean = InputField::newInputField('text', $clean, $value, 'readonly', 'ID');
        $form->addNewInput($$clean);
      }
      else if ($clean == 'image')
      {
        $img = Heading::newHeading('h2', 'Image');
        if (!empty($value))
        {
          $img .= '<img src="' . $value . '" alt="image" class="img-thumbnail">';
          $$clean = InputField::newInputField('text', $clean, $value, 'readonly', 'Image Path');
          $form->addNewInput($$clean);
        }
        else
        {
          $img .= Heading::newHeading('h4', 'Not available');
        }
      }
      else
      {
        // If not a GUID input field, allow for editing
        $$clean = InputField::newInputField('text', $clean, $value);
        $form->addNewInput($$clean);
      }
    }
    $carPic = InputField::newInputField('file', 'file', '', '', 'New Picture');
    $save   = Button::newButton('submit', 'save', 'success', 'Save');
    $delete = Button::newButton('submit', 'delete', 'danger', 'Delete');
    $form->addNewInput($carPic);
    $form->addNewInput($save);
    $form->addNewInput($delete);

    $content = $form->getForm();
    $content .= Link::newLink('Go Back', 'index.php', '_self') . '</li></ul>';

    echo parent::htmlDiv($img, 6);
    echo parent::htmlDiv($content, 4);


    // Get footer
    echo parent::getFooter();
  }
}



?>
