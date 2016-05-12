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

    $heading = Heading::newHeading('h4', 'Car detaildds');
    $content = parent::htmlAlertDiv('info', $heading);
    echo parent::htmlDiv($content, 8);

    $detailsList = Heading::newHeading('h4', 'Basic information:');
    $detailsList .= ListHTML::carDetailsList($basicInfo);
    echo parent::htmlDiv($detailsList, 6);

    $detailedList = Heading::newHeading('h4', 'Detailed information:');
    $detailedList .= ListHTML::carDetailedList($detailedInfo);
    echo parent::htmlDiv($detailedList, 6);

    $editSection = Heading::newHeading('h4', 'Edit:');
    echo parent::htmlDiv($editSection, 4);
    $hp = InputField::hiddenInputField('text', 'form');
    $price = InputField::newInputField('text', 'price', 'Price');
    $condition = InputField::newInputField('text', 'condition', 'Condition');
    $picture = InputField::newInputField('file', 'file', 'File Input');
    $submit = Button::newButton('submit', 'btn-primary', 'Submit');
    
    $form = new Form('index.php?page=editcar');
    $form->addNewInput($hp);
    $form->addNewInput($price);
    $form->addNewInput($condition);
    $form->addNewInput($picture);
    $form->addNewInput($submit);

    $formHTML = $form->getForm();
    echo parent::htmlDiv($formHTML, 4);
    $editSection .= $formHTML;
    echo parent::htmlDiv($editSection, 4);

    print_r($basicInfo);

    echo parent::htmlFooter();
  }
}

?>
