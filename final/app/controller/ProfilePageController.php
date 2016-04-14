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
      $id = parent::sanitizeString($_GET['id']);
      $user->setId($id);
    } else {
      $id = parent::sanitizeString($_GET['id']);
      $user->setId($id);
    }

    if (isset($_GET['id']) && isset($_SESSION['user_session'])
      && $_GET['id'] == $_SESSION['user_session']) {
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
