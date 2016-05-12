<?php
namespace app\controller;

use app\view\CarDetailsView;
use app\model\CarModel;
use app\collection\CarCollection;
use app\collection\UserCollection;

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

    // Check if the car belongs to the user currently logged in
    $salesman = false;

    if (isset($_SESSION['user_session'])) {
      $usersCollection = new UserCollection();
      $user = $usersCollection->create();
      $user->setId($_SESSION['user_session']);

      if ($user->checkUsersCar($carInfo['Vin'])) {
        $salesman = true;
      }
    }

    $carDetailsView = new CarDetailsView($basicInfo, $detailedInfo, $salesman);
  }

  public function post()
  {

  }
}

?>
