<?php
namespace app\view;

use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;

class ConfirmationView extends View
{
  public function __construct()
  {
    echo parent::htmlHeader('Confirmation Page');

    $heading = Heading::newHeading('h4', 'Confirmation page');
    $content = parent::htmlAlertDiv('info', $heading);
    echo parent::htmlDiv($content, 8);


    echo parent::htmlFooter();
  }
}

?>
