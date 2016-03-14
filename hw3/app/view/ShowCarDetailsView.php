<?php
namespace app\view;

use app\view\html\HTML;
use app\view\html\InputField;
use app\view\html\Form;
use app\view\html\Heading;
use app\view\html\Link;

class ShowCarDetailsView extends View
{
  public function __construct($session_array = '', $car_id = '')
  {
    // Header
    echo parent::getHeader('Car Details');

    // Get the proper car from the session array
    $car = $session_array[$car_id['id']];

    $heading = Heading::newHeading('h5', 'Car Details');
    $content = parent::htmlAlertDiv('warning', $heading);
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

    // Footer
    echo parent::getFooter();
  }
}
?>
