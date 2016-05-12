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
  public function __construct($basicInfo, $detailedInfo, $salesman = false)
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

    // Display the form to edit a car if the user is logged in and the car belongs to the user
    if ($_SESSION['user_session'] && $salesman) 
    {
      $cInfo = $basicInfo[0];
      $hp = InputField::hiddenInputField('text', 'form');
      $img_url = InputField::hiddenImageField($cInfo['Image']);
      $vin_number = InputField::newInputFieldEdit('text', 'vin', 'Vin Number', $cInfo['Vin'], true);
      $price      = InputField::newInputFieldEdit('text', 'price', 'Price', $cInfo['Price'], false);
      $condition  = InputField::newInputFieldEdit('text', 'condition', 'Condition', $cInfo['Condition'], false);
      $picture    = InputField::newInputFieldEdit('file', 'file', 'File Input', 'Value', false);
      $edit   = Button::newButtonEdit('submit', 'edit', 'btn-success', 'Edit');
      $delete = Button::newButtonEdit('submit', 'delete', 'btn-danger', 'Delete');

      $form = new Form('index.php?page=editcar', 'POST', false);
      $form->addNewInput($hp);
      $form->addNewInput($img_url);
      $form->addNewInput($vin_number);
      $form->addNewInput($price);
      $form->addNewInput($condition);
      $form->addNewInput($picture);
      $form->addNewInput($edit);
      $form->addNewInput($delete);
      $content = $form->getForm();

      $collapsible = parent::collapsibleDiv('Edit or Delete', $content);
      $collapsible .= '<br /><br /><br /><br /><br /><br /><br /><br />';

      echo parent::htmlDiv($collapsible, 6);
    }

    echo parent::htmlFooter();
  }
}

?>
