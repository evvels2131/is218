<?php
namespace app\view\page;

use app\view\html\Table;

class ShowCarsPage extends Page
{
  public function __construct($array = "")
  {
    echo Table::generateTable($array);
  }
}
?>
