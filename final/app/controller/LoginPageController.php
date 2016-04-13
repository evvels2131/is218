<?php
namespace app\controller;

use app\view\LoginPageView;
use app\collection\UserCollection;
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
      $email    = parent::sanitizeString($_POST['email']);
      $password = parent::sanitizeString($_POST['password']);

      $usersCollection = new UserCollection();
      $user = $usersCollection->create();

      $user->setEmail($email);
      $user->setPassword($password);

      if ($user->login())
      {
        $message = 'Congratulations! You have successfully logged in.';
        $type = 'success';
      }
      else
      {
        $message = 'Oops! Incorrect password and email. <br />Please go back and try again.';
        $type = 'danger';
      }
    }
    else
    {
      $message = 'Oops! Something went wrong. <br />Please go back and try again.';
      $type = 'danger';
    }

    $notificationsView = new NotificationsView($message, $type);
  }
}


?>
