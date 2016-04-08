<?php
namespace app\view;

use app\view\html\Form;
use app\view\html\InputField;
use app\view\html\Button;
use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;

class HomePageView extends View
{
  public function __construct($data = '')
  {
    echo parent::htmlHeader('Home');

    $content = '';
    if (isset($_SESSION['user_session']))
    {
      $message = 'Welcome <b>' . $_SESSION['user_fname'] . ' ' . $_SESSION['user_lname'] . '</b>!';
      $heading = parent::htmlAlertDiv('info', Heading::newHeading('h4', $message));
      echo parent::htmlDiv($heading, 8);
    }
    else
    {
      $heading = parent::htmlAlertDiv('info', Heading::newHeading('h4', '<b>Welcome!</b>
        Sing in or sing up below'));
      echo parent::htmlDiv($heading, 8);

      $username = InputField::newInputField('text', 'email', 'Email');
      $password = InputField::newInputField('password', 'password', 'Password');
      $submit   = Button::newButton('submit', 'btn-primary', 'Sing in');

      $form = new Form('index.php', 'POST');
      $form->addNewInput($username);
      $form->addNewInput($password);
      $form->addNewInput($submit);

      $content .= $form->getForm();

      $content .= Paragraph::newParagraph('Not a member yet? Please sign up below!');
      $content .= Link::newLink('Sing up', 'index.php?page=signup', '_self');
    }

    // Generate HTML and display content
    echo parent::htmlDiv($content, 4);
    echo parent::htmlFooter();
  }
}

?>
