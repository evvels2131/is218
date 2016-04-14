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
    // Check for the allowed fields
    if ($_POST['form'])
    {
      $allowed = array();
      $allowed[] = 'form';
      $allowed[] = 'email';
      $allowed[] = 'password';

      $sent = array_keys($_POST);

      if ($allowed == $sent)
      {
        if (isset($_POST['email']) && isset($_POST['password']))
        {
          $email_clean    = parent::sanitizeString($_POST['email']);
          $password_clean = parent::sanitizeString($_POST['password']);

          $usersCollection = new UserCollection();

          $user = $usersCollection->create();
          $user->setEmail($email_clean);
          $user->setPassword($password_clean);

          if ($user->login()) {
            $message = 'Congratulations! You have successfully logged in.';
            $type = 'success';
          } else {
            $message = 'Incorrect email and password. Please go back and try again.';
            $type = 'danger';
          }
        }
        else
        {
          $message = 'Please make sure you provide your email and password and
            try again.';
          $type = 'danger';
        }

        $notification = new NotificationsView($message, $type);
      }
    }
    else
    {
      $message = 'Something went wrong! Please try again.';
      $type = 'danger';
      $notification = new NotificationsView($message, $type);
      exit();
    }
  }
}


?>
