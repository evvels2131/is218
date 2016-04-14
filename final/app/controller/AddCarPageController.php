<?php
namespace app\controller;

use app\view\AddCarView;
use app\view\NotificationsView;
use app\collection\CarCollection;

class AddCarPageController extends Controller
{
  public function get()
  {
    $addCarView = new AddCarView();
  }

  public function post()
  {
    if (isset($_POST) && !empty($_POST))
    {
      // vin, price, condition
      $vin        = parent::sanitizeString($_POST['vin']);
      $price      = parent::sanitizeString($_POST['price']);
      $condition  = parent::sanitizeString($_POST['condition']);

      $carCollection = new CarCollection();
      $car = $carCollection->create();

      // Grab details from the API
      $carDetails = parent::getCarsDetails($vin);

      $car->setVin($vin);
      $car->setMake($carDetails->make->name);
      $car->setModel($carDetails->model->name);
      $car->setYear($carDetails->years[0]->year);
      $car->setPrice($price);
      $car->setCondition($condition);

      if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
        self::saveFile();
        $path = 'uploads/' . $_FILES['file']['name'];
        $car->setImageUrl($path);
      } else {
        $car->setImageUrl('http://helloworld.com/carpic.jpg');
      }

      $car->setCreatedBy($_SESSION['user_session']);

      if($car->save())
      {
        $result = 'Congratulations! You\'ve successfully added a new car.';
        $type = 'success';
        $result = self::saveFile();
      }
    }
    else
    {
      $result = 'Oops! Something went wrong. <br />Please try again.';
      $type = 'danger';
    }

    $notificationsView = new NotificationsView($result, $type);
  }

  public function saveFile()
  {
    $name     = $_FILES['file']['name'];
    $tmpName  = $_FILES['file']['tmp_name'];
    $error    = $_FILES['file']['error'];
    $size     = $_FILES['file']['size'];
    $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    $switch ($error)
    {
      case UPLOAD_ERR_OK;
        $valid = true;
        // Validate file extensions
        if (!in_array($ext, array('jpg', 'jpeg', 'png', 'gif')))
        {
          $valid = false;
          $response = 'Invalid file extension';
        }
        // Validate file size
        if ($size / 1024 / 2014 > 3)
        {
          $valid = false;
          $response = 'File size is exceeding maximum allowed size';
        }
        // Upload file
        if ($valid)
        {
          $targetPath = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR .
            'uploads' . DIRECTORY_SEPARATOR . $name;
          move_uploaded_file($tmpName, $targetPath);
        }
        break;
      case UPLOAD_ERR_INI_SIZE:
        $response = 'The uploaded file exceeds the upload_max_filesize directive
          in php.ini';
        break;
      case UPLOAD_ERR_FORM_SIZE:
        $response = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was
          specified in the HTML form.';
        break;
      case UPLOAD_ERR_PARTIAL:
        $response = 'The file was only partially uploaded';
        break;
      case UPLOAD_ERR_NO_FILE;
        $response = 'No file was uploaded';
        break;
      case UPLOAD_ERR_NO_TMP_DIR:
        $response = 'Missing a temporary folder.';
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

    return $response;
  }
}

?>
