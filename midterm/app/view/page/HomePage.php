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

    echo parent::alertDiv('success',
      Heading::newHeading('h3', 'Tomasz Goralczyk - Midterm Project - IS 218-002'));

    if (!empty($array))
    {
      echo parent::alertDiv('warning', Heading::newHeading('h4', 'Cars Stored in Session'));
      echo Table::generateTable($array);
    }
    else
    {
      $content = Heading::newHeading('h3', 'No cars stored in session to be
        displayed.');
      $content .= Heading::newHeading('h3', 'Add a new car by clicking the
        "Add New Car" link above.');
        echo parent::alertDiv('danger', $content);
    }

    // Get footer
    echo parent::getFooter();
  }
}
?>
