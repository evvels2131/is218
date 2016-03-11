<?php
namespace app\controller;

use app\view\ShowCarDetailsView;
use app\model\CarModel;

class ShowCarDetailsController extends Controller
{
  public function get()
  {
    $showCarDetailsView = new ShowCarDetailsView($_SESSION, $_GET);
  }

  public function post()
  {

  }
}

?>
