<?php
namespace app\controller;

use app\view\SignupPageView;

class SignupPageController extends Controller
{
  public function __construct($data = '')
  {
    $singupPageView = new SignupPageView($data);
  }
}

?>
