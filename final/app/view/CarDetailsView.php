<?php
namespace app\view;

use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;
use app\view\html\ListHTML;

class CarDetailsView extends View
{
  echo parent::htmlHeader('Car Details');

  $heading = Heading::newHeading('h4', 'Car details');
  $content = parent::htmlAlertDiv('info', $heading);
  echo parent::htmlDiv($content, 8);

  echo parent::htmlFooter();
}

?>
