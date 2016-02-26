<?php
namespace app\view\page;

use app\view\html\HTML;

class ShowCarDetailsPage extends Page
{
  public function __construct($array = '', $carID = '')
  {
    // Get the proper car in the array
    $car = $array[$carID['id']];

    // Display information about the car
    foreach ($car as $attribute => $value)
    {
      $clean = HTML::cleanAttribute($attribute);
      echo '<b>' . $clean . '</b>: ' . $value . '<br />';
    }
  }
}

?>
