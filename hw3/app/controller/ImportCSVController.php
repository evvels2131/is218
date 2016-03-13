<?php
namespace app\controller;

use app\view\ImportCSVView;

class ImportCSVController extends Controller
{
  public function get()
  {
    $importCSVView = new ImportCSVView;
  }

  public function post()
  {
    // Save the CSV file if submitted
    if (isset($_FILES['file']) && $_FILES['file']['size'] > 0)
    {
      parent::saveImage();
    }

    if (headers_sent())
    {
      die('Redirect failed. Please go back to home page');
    }
    else
    {
      exit(header('Location: index.php?page=importcsv'));
    }
  }
}


?>
