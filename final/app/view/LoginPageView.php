<?php
namespace app\view;

use app\view\html\Form;
use app\view\html\InputField;
use app\view\html\Button;
use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;

class LoginPageView extends View
{
  public function __construct()
  {
    echo parent::htmlHeader('Login');

    $heading = Heading::newHeading('h4', '<b>Welcome!</b> Sing in or sing up below.');
    $content = parent::htmlAlertDiv('info', $heading);
    echo parent::htmlDiv($content, 8);

    // Form
    $username = InputField::newInputField('text', 'email', 'Email');
    $password = InputField::newInputField('password', 'password', 'Password');
    $submit   = Button::newButton('submit', 'btn-primary', 'Sing in');

    $form = new Form('index.php', 'POST');
    $form->addNewInput($username);
    $form->addNewInput($password);
    $form->addNewInput($submit);

    $content = $form->getForm();
    $content .= Paragraph::newParagraph('Not a member yet? Please sing up below!');
    $content .= Link::newLink('Sing up', 'index.php?page=signup', '_self');

    echo parent::htmlDiv($content, 4);

    echo parent::htmlFooter();
  }
}

?>
