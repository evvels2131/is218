<?php
namespace app\view;

use app\view\html\Button;
use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;

class NotificationsView extends View
{
  public function __construct($notifications = '')
  {
    echo parent::htmlHeader('Notifications');

    $heading = parent::htmlAlertDiv('info', Heading::newHeading('h4', '<b>Results</b>'));

    echo parent::htmlDiv($heading, 8);

    echo parent::htmlDiv($notifications, 4);

    echo parent::htmlDiv('<button type="button" id="backButton" class="btn btn-primary">Home</button>', 4);
    //echo parent::htmlDiv('<a href="index.php">Home</a>', 4);

    echo parent::htmlFooter();
  }
}
?>
