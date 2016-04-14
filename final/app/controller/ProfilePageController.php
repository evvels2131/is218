<?php
namespace app\controller;

use app\view\ProfilePageView;
use app\collection\UserCollection;

class ProfilePageController extends Controller
{
  public function get()
  {
    $userCollection = new UserCollection();
    $user = $userCollection->create();

    if (isset($_GET['id'])) {
      $user->setId($_GET['id']);
    } else {
      $user->setId($_SESSION['user_session']);
    }

    if (isset($_GET['id']) && $_GET['id'] == $_SESSION['user_session']) {
      $loginHistory = $user->getLoginHistory();
    } else {
      $loginHistory = '';
    }

    $profilePageView = new ProfilePageView($loginHistory,
      $user->getUsersInformation(), $user->getUsersCars());
  }

  public function post()
  {

  }
}
?>
