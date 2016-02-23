<?php
namespace app\view;

use app\view\html\InputField;
use app\view\html\Form;

class AddNewCarView.php
{
  public function __construct()
  {
    $make   = InputField::newInputField('text', 'make', 'Make');
    $model  = InputField::newInputField('text', 'model', 'Model');
    $year   = InputField::newInputField('text', 'year', 'Year');
    $submit = InputField::newInputField('submit', '', 'Submit');

    $form = new Form('index.php', 'POST');

    $form->addNewInput($make);
    $form->addNewInput($model);
    $form->addNewInput($year);
    $form->addNewInput($submit);

    echo $form->getForm();
  }
}
?>
