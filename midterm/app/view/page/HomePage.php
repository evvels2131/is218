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
      echo parent::alertDiv('warning', Heading::newHeading('h4', 'Cars Stored in Session'));
      echo Table::generateTable($array);
    }
    else
    {
        echo parent::alertDiv('danger', Heading::newHeading('h4', 'No cars stored in session to be
          displayed.'));
        echo parent::alertDiv('info', Heading::newHeading('h4', 'Add a new car
          by clicking the <strong>"Add New Car"</strong> link above.'));
    }

    // Get footer
    echo parent::getFooter();
  }
}
?>
