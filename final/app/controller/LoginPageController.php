<?php
namespace app\controller;

use app\view\LoginPageView;
use app\model\UserModel;
use app\view\NotificationsView;

class LoginPageController extends Controller
{
  public function get()
  {
    $loginPageView = new LoginPageView();
  }

  public function post()
  {
    if (isset($_POST['email']) && isset($_POST['password']))
    {
      
    }
  }
}


?>
