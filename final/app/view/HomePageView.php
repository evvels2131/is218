<?php
namespace app\view;

use app\view\html\Form;
use app\view\html\InputField;
use app\view\html\Button;

class HomePageView extends View
{
  public function __construct($data = '')
  {
    //echo 'Homepage<br /><br />';
    $content = '';
    if (isset($_SESSION))
    {
      $content .= 'Welcome <strong>' . $_SESSION['username'] . '</strong>!';
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

      $content .= $form->getForm();
    }

    //$content .= Button::newButton('submit', 'btn-info', 'Information');
    // Generate HTML and display content
    echo parent::htmlHeader('Home');
    echo parent::htmlDiv($content, 6);
    echo parent::htmlFooter();
  }
}

?>
