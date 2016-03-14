<?php
namespace app\view;

use app\view\page\AddCarPage;
use app\view\html\Heading;
use app\view\html\InputField;
use app\view\html\Form;
use app\view\html\Link;
use app\view\html\Button;

class AddCarView extends View
{
  public function __construct()
  {
    // Header
    echo parent::getHeader('New Car');

    $heading = Heading::newHeading('h5', 'Add a New Car');
    $content = parent::htmlAlertDiv('warning', $heading);
    echo parent::htmlDiv($content, 8);

    // newInputField($type, $name, $value, $readonly, $placeholder)
    // I need: type, name, placeholder
    // newButton($type, $name, $class, $text)
    // I need: type, class, text
    $make   = InputField::newInputField('text', 'make', '', '', 'Make');
    $model  = InputField::newInputField('text', 'model', '', '', 'Model');
    $year   = InputField::newInputField('text', 'year', '', '', 'Year');
    $carPic = InputField::newInputField('file', 'file', '', '', 'File Input');
    $submit = Button::newButton('submit', '', 'primary', 'Submit');

    $form = new Form('index.php?page=addcar', 'POST');
    $form->addNewInput($make);
    $form->addNewInput($model);
    $form->addNewInput($year);
    $form->addNewInput($carPic);
    $form->addNewInput($submit);

    $content = $form->getForm();
    $content .= Link::newLink('Go Back', 'index.php', '_self');
    echo parent::htmlDiv($content, 4);

    // Get footer
    echo parent::getFooter();
  }
}
?>
