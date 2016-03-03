<?php
namespace app\view\page;

use app\view\html\Heading;
use app\view\html\InputField;
use app\view\html\Form;

class AddCarPage extends Page
{
  public function __construct()
  {
    // Get header
    echo parent::getHeader('New Car');

    echo parent::alertDiv('warning', Heading::newHeading('h4', 'Add a New Car'));

    $make   = InputField::newInputField('text', 'make', 'Make', '', 'Make');
    $model  = InputField::newInputField('text', 'model', 'Model', '', 'Model');
    $year   = InputField::newInputField('text', 'year', 'Year', '', 'Year');
    $submit = InputField::newInputField('submit', '', 'Submit');

    $form = new Form('index.php', 'POST');
    $form->addNewInput($make);
    $form->addNewInput($model);
    $form->addNewInput($year);
    $form->addNewInput($submit);

    echo parent::formDiv($form->getForm());

    // Get footer
    echo parent::getFooter();
  }
}

?>
