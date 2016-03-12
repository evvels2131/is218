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
      if ($clean == 'Image')
      {
        $image = Heading::newHeading('h2', 'Image');
        if (!empty($value))
        {
          $image .= '<img src="' . $value . '" alt="image" class="img-thumbnail">';
        }
        else
        {
          $image .= Heading::newHeading('h4', 'Not Available');
        }
      }
      else if ($clean == 'Guid')
      {
        continue;
      }
      else
      {
        $ctn .=  '<b>' . $clean . '</b>: ' . $value . '<br />';
      }
    }

    $ctn .= Link::newLink('<br />Go Back', 'index.php', '_self');
    $well = parent::htmlWell('lg', $ctn);
    echo parent::htmlDiv($image, 6);
    echo parent::htmlDiv($well, 6);

    // Get footer
    echo parent::getFooter();
  }
}

?>
