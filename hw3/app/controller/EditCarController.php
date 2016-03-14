<?php
namespace app\controller;

use app\view\EditCarView;
use app\model\CarModel;

class EditCarController extends Controller
{
  public function get()
  {
    $session_array = $_SESSION;
    $car_id = $_GET;

    $editCarView = new EditCarView($session_array, $car_id);
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
      // Replace the existing image with a new image of a car
      if (isset($_POST['image']) && !empty($_POST['image']))
      {
        parent::deleteFile($_POST['image']);
      }

      parent::saveFile();

      $path = 'uploads/' . $_FILES['file']['name'];

      $car->setImage($path);
      $car->save();
    }
    else if (isset($_POST['delete']))
    {
      // Delete the car and its image
      $car->delete();
      parent::deleteFile($_POST['image']);
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
