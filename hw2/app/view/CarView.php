<?php
namespace app\view;

use app\html\Table;

include_once('autoloadFunction.php');

// CarView Class
class CarView extends View
{
  public function __construct($car)
  {
    echo 'Make: ' . $car->getMake() . '<br />';
    echo 'Model: ' . $car->getModel() . '<br />';
    echo 'Year: ' . $car->getYear() . '<br />';
  }

  public static function viewCars($array)
  {
    echo Table::generateTable($array);
  }
}

?>
