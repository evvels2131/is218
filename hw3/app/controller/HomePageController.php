<?php
namespace app\controller;

use app\view\HomePageView;

class HomePageController extends Controller
{
  public function get()
  {
    $homePageView = new HomePageView($_SESSION);
  }

  public function post()
  {

  }
}
?>
