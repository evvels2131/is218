<?php
namespace app\controller;

use app\view\AddCarView;
use app\model\CarModel;

class AddCarController extends Controller
{
  // Get will display the form/addcarview page
  public function get()
  {
    $addCarPageView = new AddCarView();
  }

  // This will save the information
  public function post()
  {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $car = new CarModel;

    $car->setMake($_POST['make']);
    $car->setModel($_POST['model']);
    $car->setYear($_POST['year']);

    ////////////////////////////////////
    // Save picture of the car
    $name     = $_FILES['file']['name'];
    $tmpName  = $_FILES['file']['tmp_name'];
    $error    = $_FILES['file']['error'];
    $size     = $_FILES['file']['size'];
    $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    switch ($error)
    {
      case UPLOAD_ERR_OK:
        $valid = true;
        // validate file extensions
        if (!in_array($ext, array('jpg', 'jpeg', 'png', 'gif')))
        {
          $valid = false;
          $response = 'Invalid file extension';
        }
        // validate file size
        if ($size/1024/1024 > 2)
        {
          $valid = false;
          $response = 'File size is exceeding maximum allowed size';
        }
        // upload file
        if ($valid)
        {
          $targetPath = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'uploads' .
            DIRECTORY_SEPARATOR . $name;
          move_uploaded_file($tmpName, $targetPath);

          $car->setImage('uploads/' . $name);
          $car->save();

          header('Location: index.php');
          exit;
        }
        break;
      case UPLOAD_ERR_INI_SIZE:
        $response = 'The uploaded file exceeds the upload_max_filesize directive
          in php.ini';
        break;
      case UPLOAD_ERR_FORM_SIZE:
        $response = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was
          specified in the HTML form';
        break;
      case UPLOAD_ERR_PARTIAL:
        $response = 'The uploaded file was only partially uploaded';
        break;
      case UPLOAD_ERR_NO_FILE:
        $response = 'No file was uploaded';
        break;
      case UPLOAD_ERR_NO_TMP_DIR:
        $response = 'Missing a temporary folder';
        break;
      case UPLOAD_ERR_CANT_WRITE:
        $response = 'Failed to write to disk';
        break;
      case UPLOAD_ERR_EXTENSION:
        $response = 'File uploaded stopped by extension';
        break;
      default:
        $response = 'Unknown error';
        break;
    }

    echo $response;
    ////////////////////////////
  }
}
?>
