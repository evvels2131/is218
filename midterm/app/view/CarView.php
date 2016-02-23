<?php
namespace app\view;

use app\view\html\HTML;

class CarView extends View
{
  // Show details of a car
  public function __construct($car)
  {
    echo 'Make: ' . $car->getMake() . '<br />';
    echo 'Model: ' . $car->getModel() . '<br />';
    echo 'Year: ' . $car->getYear() . '<br />';
  }

  public static function viewCarDetails($car)
  {
    foreach ($car as $attribute => $value)
    {
      $clean = HTML::cleanAttribute($attribute);
      echo '<b>' . $clean . '</b>: ' . $value . '<br />';
    }
  }
}
?>
