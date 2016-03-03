<?php
namespace app\controller;

use app\view\HomePageView;

class HomePageController extends Controller
{
  public function __construct($data = '')
  {
    $homePageView = new HomePageView($data);
  }
}

?>
