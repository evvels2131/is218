<?php
namespace app\controller;

use app\model\CarModel;

class CarController extends Controller
{
  public function __construct($post_array = '')
  {
    isset($_POST['guid']) ? $car = new CarModel($_POST['guid']) : $car = new CarModel;

    $car->setMake($_POST['make']);
    $car->setModel($_POST['model']);
    $car->setYear($_POST['year']);

    isset($_POST['delete']) ? $car->delete() : $car->save();

    if (headers_sent())
    {
      die('Redirect failed. Please go back to home page');
    }
    else
    {
      exit(header('Location: ./index.php'));
    }
  }
}

?>
