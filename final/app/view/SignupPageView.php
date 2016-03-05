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
  public function __construct($data = '')
  {
    echo parent::htmlHeader('Home');

    $heading = parent::htmlAlertDiv('info', Heading::newHeading('h4', 'Sing up below'));
    echo parent::htmlDiv($heading, 8);

    $firstname  = InputField::newInputField('text', 'fname', 'First name');
    $lastname   = InputField::newInputField('text', 'lname', 'Last name');
    $username   = InputField::newInputField('text', 'username', 'Username');
    $email      = InputField::newInputField('text', 'email', 'Email');
    $password   = InputField::newInputField('password', 'pass', 'Password');
    $submit     = Button::newButton('submit', 'btn-primary', 'Register');

    $form = new Form('index.php', 'POST');
    $form->addNewInput($firstname);
    $form->addNewInput($lastname);
    $form->addNewInput($username);
    $form->addNewInput($email);
    $form->addNewInput($password);
    $form->addNewInput($submit);

    $content = $form->getForm();
    $content .= Link::newLink('Go Back', 'index.php', '_self');

    echo parent::htmlDiv($content, 4);

    echo parent::htmlFooter();
  }
}


?>
