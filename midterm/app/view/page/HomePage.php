<?php
namespace app\view\page;

use app\view\html\Paragraph;
use app\view\html\Heading;
use app\view\html\Table;

class HomePage extends Page
{
  public function __construct($array = '')
  {
    // Get header
    echo parent::getHeader('Home');

    if (!empty($array))
    {
      $content = parent::htmlAlertDiv('warning', Heading::newHeading('h5', 'Cars Stored in Session'));
      echo parent::htmlDiv($content, 8);

      $content = Table::generateTable($array);
      echo parent::htmlDiv($content, 6);
    }
    else
    {
        $content = parent::htmlAlertDiv('danger', Heading::newHeading('h5', 'No cars stored in session to be
          displayed.'));
        $content .= parent::htmlAlertDiv('info', Heading::newHeading('h5', 'Add a new car
          by clicking the <strong>"Add New Car"</strong> link above.'));

        echo parent::htmlDiv($content, 8);
    }

    // Get footer
    echo parent::getFooter();
  }
}
?>
