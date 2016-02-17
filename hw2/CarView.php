<?php
include_once('autoloadFunction.php');
// CarView Class
class CarView
{
  public function __construct($car)
  {
    echo 'Make: ' . $car->getMake() . '<br />';
    echo 'Model: ' . $car->getModel() . '<br />';
    echo 'Year: ' . $car->getYear() . '<br />';
  }
}

?>
