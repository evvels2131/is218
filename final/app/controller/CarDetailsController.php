<?php
namespace app\controller;

use app\view\CarDetailsView;
use app\model\CarModel;

class CarDetailsController extends Controller
{
  public function get()
  {
    $car = new CarModel();

    $car->setVin($_GET['id']);

    $details = $car->getCarDetails();

    $carDetailsView = new CarDetailsView($details);
  }

  public function post()
  {

  }
}

?>
