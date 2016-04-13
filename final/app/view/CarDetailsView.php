<?php
namespace app\view;

use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\Heading;
use app\view\html\ListHTML;

class CarDetailsView extends View
{
  public function __construct($basicInfo, $detailedInfo)
  {
    echo parent::htmlHeader('Car Details');

    $heading = Heading::newHeading('h4', 'Car details');
    $content = parent::htmlAlertDiv('info', $heading);
    echo parent::htmlDiv($content, 8);

    $detailsList = Heading::newHeading('h4', 'Basic information:');
    $detailsList .= ListHTML::carDetailsList($basicInfo);
    echo parent::htmlDiv($detailsList, 6);

    $detailedList = Heading::newHeading('h4', 'Detailed information:');
    $detailedList .= ListHTML::carDetailedList($detailedInfo);
    echo parent::htmlDiv($detailedList, 6);

    echo parent::htmlFooter();
  }
}

?>
