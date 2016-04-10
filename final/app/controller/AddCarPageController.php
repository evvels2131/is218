<?php
namespace app\controller;

use app\view\AddCarView;
use app\view\NotificationsView;
use app\model\CarModel;
use app\model\UserModel;

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

      echo '<pre>';
      print_r($_POST);
      echo '</pre>';
    }
    else
    {
      $result = 'Oops! Something went wrong. <br />Please try again.';
      $notificationsView = new NotificationsView($result);
    }
  }
}

?>
