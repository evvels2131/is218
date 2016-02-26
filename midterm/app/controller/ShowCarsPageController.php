<?php
namespace app\controller;

use app\view\page\ShowCarsPage;
use app\view\CarsView;

class ShowCarsPageController extends Controller
{
  public function __construct($session_array = '')
  {
    $carsView = new CarsView($session_array);
  }
}


?>
