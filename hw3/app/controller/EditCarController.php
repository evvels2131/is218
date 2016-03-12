<?php
namespace app\controller;

use app\view\EditCarView;
use app\model\CarModel;

class EditCarController extends Controller
{
  public function get()
  {
    $editCarView = new EditCarView($_SESSION, $_GET);
  }

  public function post()
  {
    $car = new CarModel($_POST['guid']);

    $car->setMake($_POST['make']);
    $car->setModel($_POST['model']);
    $car->setYear($_POST['year']);
    $car->setImage($_POST['image']);

    // Save picture of the car if picture submitted
    if (isset($_FILES['file']) && $_FILES['file']['size'] > 0)
    {
      $src = parent::saveImage();
      $car->setImage($src);
      $car->save();
    }
    else if (isset($_POST['delete']))
    {
      $car->delete();
      parent::deleteImage();
    }
    else
    {
      $car->save();
    }

    if (headers_sent())
    {
      die('Redirect failed. Please go back to home page');
    }
    else
    {
      exit(header('Location: index.php'));
    }
  }
}

?>
