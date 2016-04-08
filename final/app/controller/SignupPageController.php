<?php
namespace app\controller;

use app\view\SignupPageView;

class SignupPageController extends Controller
{

  public function get()
  {
    $signupPageView = new SignupPageView();
  }

  public function post()
  {

  }
}

?>
