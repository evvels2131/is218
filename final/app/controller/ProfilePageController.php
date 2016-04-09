<?php
namespace app\controller;

use app\view\ProfilePageView;
use app\model\UserModel;

class ProfilePageController extends Controller
{
  public function get()
  {
    $user = new UserModel();
    $user->setId($_SESSION['user_session']);

    $loginAttempts = $user->getLoginAttempts();
    $userInfo = $user->getUserInformation();

    $profilePageView = new ProfilePageView($loginAttempts, $userInfo);
  }

  public function post()
  {

  }
}
?>
