<?php
namespace app\view\page;

use app\view\html\Heading;
use app\view\html\InputField;
use app\view\html\Form;
use app\view\html\Link;

class AddCarPage extends Page
{
  public function __construct()
  {
    // Get header
    echo parent::getHeader('New Car');

    $content = parent::htmlAlertDiv('warning', Heading::newHeading('h5', 'Add a New Car'));
    echo parent::htmlDiv($content, 8);

    $make   = InputField::newInputField('text', 'make', 'Make', '', 'Make');
    $model  = InputField::newInputField('text', 'model', 'Model', '', 'Model');
    $year   = InputField::newInputField('text', 'year', 'Year', '', 'Year');
    $submit = InputField::newInputField('submit', '', 'Submit');

    $form = new Form('index.php', 'POST');
    $form->addNewInput($make);
    $form->addNewInput($model);
    $form->addNewInput($year);
    $form->addNewInput($submit);

    $content = $form->getForm();
    $content .= Link::newLink('Go Back', 'index.php', '_self');
    echo parent::htmlDiv($content, 4);

    // Get footer
    echo parent::getFooter();
  }
}

?>
