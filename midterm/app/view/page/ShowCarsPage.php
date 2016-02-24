<?php
namespace app\view\page;

class ShowCarsPage extends Page
{
  public function get($array = "")
  {
    // Display a table with all cars stored in a session
    CarsView::viewCarsTable($array);
  }

  public function post()
  {
    Paragraph::newParagraph('This is the ShowCarsPage. post() method called.');
  }
}
?>
