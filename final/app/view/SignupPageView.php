<?php
namespace app\view;

use app\view\html\Form;
use app\view\html\InputField;
use app\view\html\Button;
use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;

class SignupPageView extends View
{
  public function __construct()
  {
    echo parent::htmlHeader('Home');

    $heading = parent::htmlAlertDiv('info', Heading::newHeading('h4', 'Sign up below'));
    echo parent::htmlDiv($heading, 8);

    $hp         = InputField::hiddenInputField('text', 'form');
    $firstname  = InputField::newInputField('text', 'fname', 'First name');
    $lastname   = InputField::newInputField('text', 'lname', 'Last name');
    $email      = InputField::newInputField('text', 'email', 'Email');
    $password   = InputField::newInputField('password', 'pass', 'Password');
    $password2  = InputField::newInputField('password', 'pass2', 'Re-enter password');
    $submit     = Button::newButton('submit', 'btn-primary', 'Register');

    $form = new Form('index.php?page=signup', 'POST');
    $form->addNewInput($hp);
    $form->addNewInput($firstname);
    $form->addNewInput($lastname);
    $form->addNewInput($email);
    $form->addNewInput($password);
    $form->addNewInput($password2);
    $form->addNewInput($submit);

    $content = $form->getForm();
    $content .= Link::newLink('Go Back', 'index.php', '_self');

    echo parent::htmlDiv($content, 4);

    echo parent::htmlFooter();
  }
}


?>
