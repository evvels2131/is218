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

    $profilePageView = new ProfilePageView($user->getLoginHistory(),
      $user->getUsersInformation(), $user->getUsersCars());
  }

  public function post()
  {

  }
}
?>
