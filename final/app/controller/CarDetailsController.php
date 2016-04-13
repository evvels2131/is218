<?php
namespace app\controller;

use app\view\CarDetailsView;
use app\model\CarModel;
use app\collection\CarCollection;

class CarDetailsController extends Controller
{
  public function get()
  {
    $carCollection = new CarCollection();

    $car = $carCollection->create();
    $car->setId($_GET['id']);

    $basicInfo = $car->getBasicInformation();

    $carInfo = $basicInfo[0];
    $vin = $carInfo['Vin'];
    $detailedInfo = parent::getCarsDetails($vin);

    $carDetailsView = new CarDetailsView($basicInfo, $detailedInfo);
  }

  public function post()
  {

  }
}

?>
