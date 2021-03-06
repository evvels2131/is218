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
    $car = new CarModel;

    $car->setMake($_POST['make']);
    $car->setModel($_POST['model']);
    $car->setYear($_POST['year']);

    // Save picture of the car if picture submitted
    if (isset($_FILES['file']) && $_FILES['file']['size'] > 0)
    {
      $src = parent::saveFile();
      $path = 'uploads/' . $_FILES['file']['name'];
      $car->setImage($path);
      $car->save();
    }
    else
    {
      $car->save();
    }

    // Redirect
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
