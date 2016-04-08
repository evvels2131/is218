<?php
namespace app\view;

use app\view\html\Button;
use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;


class ErrorPageView extends View
{
  public function __construct($errors = '')
  {
    echo parent::htmlHeader('Error');

    $heading = parent::htmlAlertDiv('danger', Heading::newHeading('h4', 'Oops! Something went wrong!'));
    echo parent::htmlDiv($heading, 8);

    echo parent::htmlDiv($errors, 6);

    /*
    <button onclick="goBack()">Go Back</button>

    <script>
      function goBack() {
        window.history.back();
      }
    }
    </script>
    */

    echo parent::htmlFooter();
  }
}

?>
