<?php
namespace app\view;

use app\view\html\Button;
use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;

class NotificationsView extends View
{
  public function __construct($notifications = '', $type = '')
  {
    echo parent::htmlHeader('Notifications');

    $heading = parent::htmlAlertDiv($type, Heading::newHeading('h4', '<b>Results</b>'));

    echo parent::htmlDiv($heading, 8);

    $well = parent::htmlWell($notifications);

    echo parent::htmlDiv($well, 6);

    echo parent::htmlFooter();
  }
}
?>
