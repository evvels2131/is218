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
    $success = true;

    // Check for the allowed fields
    if ($_POST['form'] && empty($_POST['hpt']))
    {
      $allowed = array();
      $allowed[] = 'form';
      $allowed[] = 'hpt';
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
            $message = 'Something went wrong. Please make sure you are proving
              correct information.';
            $success = false;
          }

          // Check if the token from form matches the one saved in the session
          if (isset($_SESSION['token']) && $_POST['form'] != $_SESSION['token']) {
            $message = 'Something went wrong. Please try again.';
            $success = false;
          }

          // If the checks fail
          if (!$success) {
            $notification = new NotificationsView($message, 'danger');
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
            $success = true;
          } else {
            $message = 'Incorrect email or password. Please go back and try again.';
            $success = false;
          }
        }
        else
        {
          $message = 'Please make sure you provide your email and password and
            try again.';
          $success = false;
        }
      } else {
        $message = 'Something went wrong. Please try again.';
        $success = false;
      }

    }
    else
    {
      $message = 'Something went wrong. Please try again.';
      $success = false;
    }

    unset($_SESSION['token']);
    unset($_SESSION['digit']);

    if ($success) {
      $type = 'success';
    } else {
      $type = 'danger';
    }

    $notification = new NotificationsView($message, $type);
  }
}

?>
