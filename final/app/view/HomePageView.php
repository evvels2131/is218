<?php
namespace app\view;

use app\view\html\Form;
use app\view\html\InputField;
use app\view\html\Button;
use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;

class HomePageView extends View
{
  public function __construct($cars = '')
  {
    echo parent::htmlHeader('Home');

    if (!empty($cars))
    {
      $heading = Heading::newHeading('h4', 'Cars for sale');
      $content = parent::htmlAlertDiv('info', $heading);
      echo parent::htmlDiv($content, 8);
    }
    else
    {
      $heading = Heading::newHeading('h4', 'There are currently no cars for sale');
      $content = parent::htmlAlertDiv('danger', $heading);
      echo parent::htmlDiv($content, 8);
    }

    echo parent::htmlFooter();
  }
}

?>
