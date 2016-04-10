<?php
namespace app\controller;

use app\view\ProfilePageView;
use app\model\UserModel;

class ProfilePageController extends Controller
{
  public function get()
  {
    $user = new UserModel();

    if (isset($_GET['id']))
    {
      $user->setId($_GET['id']);
    }
    else
    {
      $user->setId($_SESSION['user_session']);
    }

    $loginAttempts = $user->getLoginAttempts();
    $userInfo = $user->getUserInformation();
    $usersCars = $user->getUserCars();

    $profilePageView = new ProfilePageView($loginAttempts, $userInfo, $usersCars);
  }

  public function post()
  {

  }
}
?>
