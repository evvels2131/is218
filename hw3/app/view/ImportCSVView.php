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

    // Check if a csv file exists in the uploads folder
    // If so, display a table and a button to delete the file if necessary
    $dir = 'uploads/*.csv';

    foreach (glob($dir) as $file)
    {
      if ($file != NULL)
      {
        $content = Heading::newHeading('h3', 'File currently being processed:');
        $content .= '<p><strong>' . basename($file) . '</strong></p>';
        $content .= '<a href="index.php?page=importcsv&deleteFile=' . $file . '"
          class="btn btn-danger btn-xs" role="button">Remove</a>';

        echo parent::htmlDiv($content, 6);

        $arrayCSV = array();
        $pathToFile = 'uploads/' . basename($file);
        $handle = fopen($pathToFile, 'r');

        if ($handle)
        {
          while (($data = fgetcsv($handle, 1000, ',')) != false)
          {
            $arrayCSV[] = $data;
          }
          fclose($handle);
        }
        $table = '<br /><br />';
        $table .= Heading::newHeading('h3', 'This table only shows 13 columns and 200 rows');
        $table .= '<br />';
        $table .= CSVTable::generateCSVTable($arrayCSV);
        echo parent::htmlDiv($table, 10);
      }
    }

    // If no csv files in the uploads directory, display the form
    if (glob($dir) == NULL)
    {
      // Form to upload CSV file
      $csvFile = InputField::newInputField('file', 'file', '', '', 'File Input');
      $submit = Button::newButton('submit', '', 'primary btn-sm', 'Upload');

      $form = new Form('index.php?page=importcsv', 'POST');
      $form->addNewInput($csvFile);
      $form->addNewInput($submit);

      $content = Heading::newHeading('h4', 'Import CSV File Below:');
      $content .= $form->getForm();
      echo parent::htmlDiv($content, 4);
    }

    // Footer
    echo parent::getFooter();
  }
}
?>
