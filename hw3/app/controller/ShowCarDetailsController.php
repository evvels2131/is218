<?php
namespace app\controller;

use app\view\ShowCarDetailsView;
use app\model\CarModel;

class ShowCarDetailsController extends Controller
{
  public function get()
  {
    $session_array = $_SESSION;
    $car_id = $_GET;

    $showCarDetailsView = new ShowCarDetailsView($session_array, $car_id);
  }

  public function post()
  {

  }
}

?>
