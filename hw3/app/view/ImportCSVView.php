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

    // Check if a csv file exists in the uploads folder
    // If so, display a table and a button to delete the file if necessary
    $dir = 'uploads/*.csv';

    foreach (glob($dir) as $file)
    {
      // If a csv file exists on the server, process it
      if ($file != NULL)
      {
        $heading = Heading::newHeading('h5', 'File Being Processed');
        $content = parent::htmlAlertDiv('warning', $heading);
        
        echo parent::htmlDiv($content, 8);

        $content = '<p><strong>' . basename($file) . '</strong>&ensp;&ensp;';
        $content .= '<span><a href="index.php?page=importcsv&deleteFile=' . $file . '"
          class="btn btn-danger btn-xs" role="button">Remove</a></span></p>';

        echo parent::htmlDiv($content, 6);

        // Open up the file and save its content into an array
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

        echo parent::htmlDiv($table, 12);
      }
    }

    // If no csv files in the uploads directory, display the form
    if (glob($dir) == NULL)
    {
      $heading = Heading::newHeading('h5', 'Upload a CSV file to see its content below
        in a table.');
      $content .= parent::htmlAlertDiv('info', $heading);
      echo parent::htmlDiv($content, 8);

      // Form to upload CSV file
      $csvFile = InputField::newInputField('file', 'file', '', '', 'File Input');
      $submit = Button::newButton('submit', '', 'primary btn-xs', 'Upload');

      $form = new Form('index.php?page=importcsv', 'POST');
      $form->addNewInput($csvFile);
      $form->addNewInput($submit);

      $content = $form->getForm();
      echo parent::htmlDiv($content, 4);
    }

    // Footer
    echo parent::getFooter();
  }
}
?>
