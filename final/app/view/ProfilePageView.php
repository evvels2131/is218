<?php
namespace app\view;

use app\view\html\Button;
use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;
use app\view\html\ListHTML;

class ProfilePageView extends View
{
  public function __construct($loginAttempts = '')
  {
    echo parent::htmlHeader('Profile Information');

    $text = 'Profile information of <b>' . $_SESSION['user_fname'] . ' ' . $_SESSION['user_lname'] . '</b>';
    $heading = Heading::newHeading('h4', $text);
    $content = parent::htmlAlertDiv('info', $heading);
    echo parent::htmlDiv($content, 8);

    $content = Heading::newHeading('h4', 'You have logged in on the following dates:');
    $content .= ListHTML::loginAttemptsList($loginAttempts);
    echo parent::htmlDiv($content, 4);

    echo parent::htmlFooter();
  }
}

?>
