<?php
namespace app\view;

use app\view\html\Form;
use app\view\html\InputField;
use app\view\html\Button;
use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;
use app\view\html\CaptchaHTML;

class LoginPageView extends View
{
  public function __construct()
  {
    echo parent::htmlHeader('Login');

    $heading = Heading::newHeading('h4', '<b>Welcome!</b> Sing in or sing up below.');
    $content = parent::htmlAlertDiv('info', $heading);
    echo parent::htmlDiv($content, 8);

    // Form
    $hp_uniq  = InputField::hiddenInputField('text', 'form');
    $hp       = InputField::hpInputField();
    $username = InputField::newInputField('text', 'email', 'Email');
    $password = InputField::newInputField('password', 'password', 'Password');
    $captcha  = InputField::captchaInputField();
    $submit   = Button::newButton('submit', 'btn-primary', 'Sing in');

    $form = new Form('index.php?page=login', 'POST');
    $form->addNewInput($hp_uniq);
    $form->addNewInput($hp);
    $form->addNewInput($username);
    $form->addNewInput($password);
    $form->addNewInput($captcha);
    $form->addNewInput($submit);

    $content = $form->getForm();
    $content .= Paragraph::newParagraph('Not a member yet? Please sing up below!');
    $content .= Link::newLink('Sing up', 'index.php?page=signup', '_self');

    echo parent::htmlDiv($content, 4);

    echo parent::htmlFooter();
  }
}

?>
