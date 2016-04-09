<?php
namespace app\controller;

use app\view\AddCarView;
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

  }
}

?>
