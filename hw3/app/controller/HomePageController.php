<?php
namespace app\controller;

use app\view\HomePageView;

class HomePageController extends Controller
{
  public function __construct($array = '')
  {
    $homePageView = new HomePageView($array);
  }
}
?>
