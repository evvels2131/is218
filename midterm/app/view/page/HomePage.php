<?php
namespace app\view\page;

use app\view\html\Paragraph;
use app\view\html\Heading;

class HomePage extends Page
{
  public function __construct()
  {
    echo Heading::newHeading('h1', 'Home Page');
    echo Paragraph::newParagraph('Sample paragraph');
  }
}
?>
