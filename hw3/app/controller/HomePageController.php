<?php
namespace app\controller;

use app\view\HomePageView;

class HomePageController extends Controller
{
  public function get()
  {
    // Session array
    $session_array = $_SESSION;

    $homePageView = new HomePageView($session_array);
  }

  public function post()
  {

  }
}
?>
