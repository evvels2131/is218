<?php
namespace app\view;

use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;
use app\view\html\Form;
use app\view\html\InputField;
use app\view\html\Button;

class AddCarView extends View
{
  public function __construct()
  {
    echo parent::htmlHeader('Add New Car');

    $heading = Heading::newHeading('h4', 'Add a new car below');
    $content = parent::htmlAlertDiv('info', $heading);
    echo parent::htmlDiv($content, 8);

    // Form
    $vin_number = InputField::newInputField('text', 'vin', 'Vin Number');
    $price      = InputField::newInputField('text', 'price', 'Price');
    $condition  = InputField::newInputField('text', 'condition', 'Condition');
    $submit     = Button::newButton('submit', 'btn-primary', 'Submit');

    $form = new Form('index.php?page=addcar', 'POST');
    $form->addNewInput($vin_number);
    $form->addNewInput($price);
    $form->addNewInput($condition);
    $form->addNewInput($submit);

    $content = $form->getForm();
    echo parent::htmlDiv($content, 4);

    echo parent::htmlFooter();
  }
}

?>
