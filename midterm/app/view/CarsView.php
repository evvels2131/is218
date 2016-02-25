<?php
namespace app\view;

use app\view\page\ShowCarsPage;

class CarsView extends View
{
  public function __construct($array = "")
  {
    $showCarsPage = new ShowCarsPage($array);
  }
}
?>
