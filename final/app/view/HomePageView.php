<?php
namespace app\view;

use app\view\html\Form;
use app\view\html\InputField;
use app\view\html\Button;
use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;
use app\view\html\Table;
use app\view\html\Paging;

class HomePageView extends View
{
  public function __construct($cars = '', $amountOfPages = '', $page_no = '')
  {
    echo parent::htmlHeader('Home');

    if (!empty($cars))
    {
      $heading = Heading::newHeading('h4', 'Cars for sale');
      $content = parent::htmlAlertDiv('info', $heading);
      echo parent::htmlDiv($content, 8);

      $carsTable = Table::displayCarsTable($cars);
      echo parent::htmlDiv($carsTable, 10);

      $paging = Paging::getPagingLinks($amountOfPages);
      if (isset($page_no) && !empty($page_no)) {
        $paging .= '<span style="margin-left: 25px;"><b>Page:</b> ' . $page_no . '</span>';
      }
      echo parent::htmlDiv($paging, 2);
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
