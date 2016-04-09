<?php
namespace app\view;

use app\view\html\Button;
use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;

class ProfilePageView extends View
{
  public function __construct($data = '')
  {
    echo parent::htmlHeader('Profile Information');

    $text = 'Profile information of <b>' . $_SESSION['user_fname'] . ' ' . $_SESSION['user_lname'] . '</b>';
    $heading = Heading::newHeading('h4', $text);
    $content = parent::htmlAlertDiv('info', $heading);
    echo parent::htmlDiv($content, 8);

    echo parent::htmlFooter();
  }
}

?>
