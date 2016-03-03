<?php
namespace app\view;

use app\view\html\Form;
use app\view\html\InputField;

class HomePageView extends View
{
  public function __construct($data = '')
  {
    echo 'Homepage<br /><br />';
    if (isset($_SESSION))
    {
      echo 'Welcome <strong>' . $_SESSION['username'] . '</strong>!';
    }
    else
    {
      $username = InputField::newInputField('text', 'username', 'Username');
      $password = InputField::newInputField('password', 'password', 'Password');
      $submit   = InputField::newInputField('submit', 'login', '', 'Log In');

      $form = new Form('index.php', 'POST');
      $form->addNewInput($username);
      $form->addNewInput($password);
      $form->addNewInput($submit);
      echo $form->getForm();
    }
  }
}

?>
