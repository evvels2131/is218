<?php
namespace app\view\page;

use app\view\html\Heading;
use app\view\html\InputField;
use app\view\html\Form;

class AddCarPage extends Page
{
  public function __construct()
  {
    echo Heading::newHeading('h1', 'Add a New Car');

    $make   = InputField::newInputField('text', 'make', 'Make', '', 'placeholder');
    $model  = InputField::newInputField('text', 'model', 'Model', '', 'placeholder');
    $year   = InputField::newInputField('text', 'year', 'Year', '', 'placeholder');
    $submit = InputField::newInputField('submit', '', 'Submit', '', 'placeholder');

    $form = new Form('index.php', 'POST');
    $form->addNewInput($make);
    $form->addNewInput($model);
    $form->addNewInput($year);
    $form->addNewInput($submit);

    echo $form->getForm();
  }
}
?>
