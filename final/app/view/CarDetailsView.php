<?php
namespace app\view;

use app\view\html\Paragraph;
use app\view\html\Link;
use app\view\html\ListHTML;
use app\view\html\Form;
use app\view\html\InputField;
use app\view\html\Button;
use app\view\html\Heading;

class CarDetailsView extends View
{
  public function __construct($basicInfo, $detailedInfo)
  {
    echo parent::htmlHeader('Car Details');

    $heading = Heading::newHeading('h4', 'Car detaildds');
    $content = parent::htmlAlertDiv('info', $heading);
    echo parent::htmlDiv($content, 8);

    $detailsList = Heading::newHeading('h4', 'Basic information:');
    $detailsList .= ListHTML::carDetailsList($basicInfo);
    echo parent::htmlDiv($detailsList, 6);

    $detailedList = Heading::newHeading('h4', 'Detailed information:');
    $detailedList .= ListHTML::carDetailedList($detailedInfo);
    echo parent::htmlDiv($detailedList, 6);

    $cInfo = $basicInfo[0];
    $vin_number = InputField::newInputFieldEdit('text', 'vin', 'Vin Number', $cInfo['Vin'], true);
    $price      = InputField::newInputFieldEdit('text', 'price', 'Price', $cInfo['Price'], false);
    $condition  = InputField::newInputFieldEdit('text', 'condition', 'Condition', $cInfo['Condition'], false);
    $picture    = InputField::newInputFieldEdit('file', 'file', 'File Input', 'Value', false);
    $submit     = Button::newButton('submit', 'btn-primary', 'Submit');

    $form = new Form('index.php?page=editcar', 'POST', false);
    $form->addNewInput($vin_number);
    $form->addNewInput($price);
    $form->addNewInput($condition);
    $form->addNewInput($picture);
    $form->addNewInput($submit);
    $content = $form->getForm();

    $collapsible = parent::collapsibleDiv('Edit or Delete', $content);

    echo parent::htmlDiv($collapsible, 6);

    echo parent::htmlFooter();
  }
}

?>
