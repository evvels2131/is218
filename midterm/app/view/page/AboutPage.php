<?php
namespace app\view\page;

use app\view\html\Paragraph;

class AboutPage extends Page
{
  public function get()
  {
    Paragraph::newParagraph('This is the AboutPage. get() method called.');
  }

  public function post()
  {
    Paragraph::newParagraph('This is the AboutPage. post() method called.');
  }
}
?>
