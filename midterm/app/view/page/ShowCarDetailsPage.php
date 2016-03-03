<?php
namespace app\view\page;

use app\view\html\HTML;
use app\view\html\InputField;
use app\view\html\Form;
use app\view\html\Heading;

class ShowCarDetailsPage extends Page
{
  public function __construct($array = '', $carID = '')
  {
    // Get header
    echo parent::getHeader('Car Details');

    // Get the proper car in the array
    $car = $array[$carID['id']];

    echo parent::alertDiv('warning', Heading::newHeading('h4', 'Car Details'));

    // Display information about the car
    foreach ($car as $attribute => $value)
    {
      $clean = HTML::cleanAttribute($attribute);
      echo '<b>' . $clean . '</b>: ' . $value . '<br />';
    }

    // Get footer
    echo parent::getFooter();
  }
}

?>
