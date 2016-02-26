<?php
namespace app\controller;

//use app\view\page\ShowCarDetailsdPage;
//use app\view\CarView;
use app\view\ShowCarDetailsView;

class ShowCarDetailsController extends Controller
{
  public function __construct($session_array = '', $get_array = '')
  {
    $showCarDetailsView = new ShowCarDetailsView($session_array, $get_array);
  }
}

?>
