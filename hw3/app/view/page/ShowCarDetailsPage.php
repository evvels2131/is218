<?php
namespace app\view\page;

use app\view\html\HTML;
use app\view\html\InputField;
use app\view\html\Form;
use app\view\html\Heading;
use app\view\html\Link;

class ShowCarDetailsPage extends Page
{
  public function __construct($array = '', $carID = '')
  {
    // Get header
    echo parent::getHeader('Car Details');

    // Get the proper car in the array
    $car = $array[$carID['id']];

    $content = parent::htmlAlertDiv('warning', Heading::newHeading('h5', 'Car Details'));
    echo parent::htmlDiv($content, 8);

    // Display information about the car
    foreach ($car as $attribute => $value)
    {
      $clean = HTML::cleanAttribute($attribute);
      $ctn .=  '<b>' . $clean . '</b>: ' . $value . '<br />';
    }

    $ctn .= Link::newLink('Go Back', 'index.php', '_self');

    echo parent::htmlDiv($ctn, 6);

    // Get footer
    echo parent::getFooter();
  }
}

?>
