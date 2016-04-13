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
      $car->setImageUrl('http://helloword.com/carpic.jgp');
      $car->setCreatedBy($_SESSION['user_session']);

      if($car->save())
      {
        $result = 'Congratulations! You\'ve successfully added a new car.';
        $type = 'success';
      }
    }
    else
    {
      $result = 'Oops! Something went wrong. <br />Please try again.';
      $type = 'danger';
    }

    $notificationsView = new NotificationsView($result, $type);
  }
}

?>
