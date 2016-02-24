<?php
namespace app\view\page;

use app\view\html\Paragraph;
use app\view\html\InputField;
use app\view\html\Form;

class AddCarPage extends Page
{
  public function get()
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

  public function post()
  {
    Paragraph::newParagraph('This is the AddNewCarPage. post() method called.');
  }
}
?>
