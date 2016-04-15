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

    // Display users cars if he/she has added any
    if (!empty($usersCars))
    {
      $content = Heading::newHeading('h4', 'Cars added by this user:');
      $content .= Table::displayCarsTable($usersCars);
      echo parent::htmlDiv($content, 10);
    }

    $content = Heading::newHeading('h4', 'Basic user information:');
    $content .= ListHTML::databaseList($userInformation);
    $well = parent::htmlWell($content);
    echo parent::htmlDiv($well, 6);

    // Display the login attemps if user is logged in
    if (isset($_SESSION['user_session']) && !empty($_SESSION['user_session']) &&
      !empty($loginAttempts))
    {
      $content = Heading::newHeading('h4', 'Login attempts:');
      $content .= Table::userLoginHistory($loginAttempts);
      echo parent::htmlDiv($content, 6);
    }

    echo parent::htmlFooter();
  }
}

?>
