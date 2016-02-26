<?php
namespace app\controller;

use app\view\AddCarView;

class AddCarPageController extends Controller
{
  public function __construct()
  {
    $addCarPageView = new AddCarView();
  }
}
?>
