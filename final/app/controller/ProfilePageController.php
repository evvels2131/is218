<?php
namespace app\controller;

use app\view\ProfilePageView;

class ProfilePageController extends Controller
{
  public function get()
  {
    $profilePageView = new ProfilePageView();
  }

  public function post()
  {

  }
}


?>
