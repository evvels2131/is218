<?php
namespace app\view;

use app\view\html\Paragraph;
use app\view\html\Heading;
use app\view\html\Table;

class HomePageView extends View
{
  public function __construct($session_array = '')
  {
    // Header
    echo parent::getHeader('Home');

    // Content
    if (!empty($session_array))
    {
      $heading = Heading::newHeading('h5', 'Cars Stored in Session');
      $content = parent::htmlAlertDiv('warning', $heading);
      echo parent::htmlDiv($content, 8);

      $content = Table::generateTable($session_array);
      echo parent::htmlDiv($content, 6);
    }
    else
    {
      $heading = Heading::newHeading('h5', 'No cars stored in session to be displayed.');
      $content = parent::htmlAlertDiv('danger', $heading);
      $heading = Heading::newHEading('h5', 'Add a new car by clicking the <strong>"Add
        New Car"</strong> link above.');
      $content .= parent::htmlAlertDiv('info', $heading);

      echo parent::htmlDiv($content, 8);
    }

    // Footer
    echo parent::getFooter();
  }
}

?>
