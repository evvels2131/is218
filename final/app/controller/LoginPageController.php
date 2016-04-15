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
      $allowed[] = 'captcha';

      $sent = array_keys($_POST);

      if ($allowed == $sent)
      {
        if (isset($_POST['email']) && isset($_POST['password']))
        {
          // Check if the captcha field is correct
          if (isset($_POST['captcha']) && $_POST['captcha'] != $_SESSION['digit']) {
            $message = 'Something went wrong. Please make sure your captcha code is correct.';
            $type = 'danger';
            $notification = new NotificationsView($message, $type);
            session_destroy();
            exit();
          }

          // Check if the token from form matches the one saved in the session
          if (isset($_SESSION['token']) && $_POST['form'] != $_SESSION['token']) {
            $message = 'Something went wrong. Please try again.';
            $type = 'danger';
            $notification = new NotificationsView($message, $type);
            session_destroy();
            exit();
          }

          // Check if the email is valid
          if (!parent::isValidEmail($_POST['email'])) {
            $message = 'Incorrect email or password. Please try again.';
            $type = 'danger';
            $notification = new NotificationsView($message, $type);
            session_destroy();
            exit();
          }

          $clean_email = parent::sanitizeString($_POST['email']);
          $clean_password = parent::sanitizeString($_POST['password']);

          $usersCollection = new UserCollection();

          $user = $usersCollection->create();
          $user->setEmail($clean_email);
          $user->setPassword($clean_password);

          if ($user->login()) {
            $message = 'Congratulations! You have successfully logged in.';
            $type = 'success';
            unset($_SESSION['token']);
            unset($_SESSION['digit']);
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
