<?php
namespace app\view;

use app\view\html\Table;

class CarsView extends View
{
  public function __construct($array)
  {
    echo Table::generateTable($array);
  }
}
?>
