<?php
namespace app\view;

use app\view\html\Button;
use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;
use app\view\html\ListHTML;
use app\view\html\Table;

class ProfilePageView extends View
{
  public function __construct($loginAttempts = '', $userInformation = '', $usersCars = '')
  {
    echo parent::htmlHeader('Profile Information');

    $heading = Heading::newHeading('h4', 'Profile information');
    $content = parent::htmlAlertDiv('info', $heading);
    echo parent::htmlDiv($content, 8);

    $content = Heading::newHeading('h4', 'Basic user information:');
    $content .= ListHTML::databaseList($userInformation);
    echo parent::htmlDiv($content, 6);

    // Display the login attemps if user is logged in
    if (isset($_SESSION['user_session']) && !empty($_SESSION['user_session']))
    {
      $content = Heading::newHeading('h4', 'You have logged in on the following dates:');
      $content .= Table::userLoginHistory($loginAttempts);
      echo parent::htmlDiv($content, 6);
    }

    // Display users cars if he/she has added any
    if (!empty($usersCars))
    {
      $content = Heading::newHeading('h4', 'Cars added by the user:');
      $content .= Table::displayCarsTable($usersCars);
      echo parent::htmlDiv($content, 10);
    }

    echo parent::htmlFooter();
  }
}

?>
