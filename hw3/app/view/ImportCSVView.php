<?php
namespace app\view;

use app\view\html\HTML;
use app\view\html\InputField;
use app\view\html\Form;
use app\view\html\Heading;
use app\view\html\Button;
use app\view\html\Link;
use app\view\html\CSVTable;

class ImportCSVView extends View
{
  public function __construct()
  {
    // Header
    echo parent::getHeader('Import CSV File');

    $content = parent::htmlAlertDiv('warning', Heading::newHeading('h5', 'Import CSV File'));
    echo parent::htmlDiv($content, 8);

    // Form to upload CSV file
    $csvFile = InputField::newInputField('file', 'file', '', '', 'File Input');
    $submit = Button::newButton('submit', '', 'primary btn-sm', 'Upload');

    $form = new Form('index.php?page=importcsv', 'POST');
    $form->addNewInput($csvFile);
    $form->addNewInput($submit);

    $content = Heading::newHeading('h4', 'Import CSV File Below:');
    $content .= $form->getForm();
    echo parent::htmlDiv($content, 4);

    $arrResult = array();
    $handle = fopen('uploads/16tstcar.csv', 'r');
    if ($handle)
    {
      while (($data = fgetcsv($handle, 1000, ',')) != false)
      {
        $arrResult[] = $data;
      }
      fclose($handle);
    }

    $table = CSVTable::generateCSVTable($arrResult);

    $table = '<table class="table table-striped"><tr>';
    // table header
    $cols = 0;
    foreach ($arrResult[0] as $key => $value)
    {
      $table .= '<th>' . $value . '</th>';
      if (++$i == 12) break; // limit to create only 12 table headings
    }
    $table .= '</tr>';

    foreach ($arrResult as $key => $value)
    {
      if ($key == 0)
      {
        // Skip the first row
        continue;
      }
      else if ($key < 200) // limit only to display 200 table rows
      {
        $table .= '<tr>';
        foreach ($value as $key => $val)
        {
          // Limit to display only 13 columns
          if (++$key == 13)
          {
            $key = 0;
            break;
          }
          else
          {
            $table .= '<td>' . $val . '</td>';
          }
        }
        $table .= '</tr>';
      }
    }
    $table .= '</table>';

    /*$firstArray = $arrResult[0];

    foreach ($firstArray as $key => $value)
    {
      echo $key . $value;
    }*/

    echo parent::htmlDiv($table, 12);


    /*echo '<table>';
    $f = fopen('uploads/16tstcar.csv', 'r');
    while (($line = fgetcsv($f)) !== false)
    {
      echo '<tr>';
      foreach ($line as $cell)
      {
        echo '<td>' . htmlspecialchars($cell) .'</td>';

        //if (++$i == 2) break;
      }
      echo '</tr>';
    }
    fclose($f);
    echo '</table>';

    /*foreach ($arrResult as $key => $value)
    {
      if (is_array($value))
      {
        foreach ($value as $key => $value)
        {
          echo '<strong>Key</strong>: ' . $key . ' <strong>Value:</strong> ' . $value . '<br />';
        }
      }
      //echo '<strong>Key</strong>: ' . $key . ' <strong>Value:</strong> ' . $value . '<br />';
    }*/

    //$table = Table::generateTable($arrResult);
    //echo parent::htmlDiv($table, 12);



    //$content = print_r($arrResult);
    //echo parent::htmlDiv($content, 10);





    // Footer
    echo parent::getFooter();
    //echo Table::generateTable($arrResult);
    /*echo '<pre>';
    print_r($arrResult);
    echo '</pre>';*/
    //print_r($arrResult);
    //echo 'haha';*/
  }
}
?>
