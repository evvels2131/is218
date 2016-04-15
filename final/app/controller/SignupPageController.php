<?php
namespace app\controller;

use app\view\SignupPageView;
use app\view\NotificationsView;
use app\collection\UserCollection;

class SignupPageController extends Controller
{
  public function get()
  {
    $signupPageView = new SignupPageView();
  }

  public function post()
  {
    if ($_POST['form'])
    {
      $allowed = array();
      $allowed[] = 'form';
      $allowed[] = 'fname';
      $allowed[] = 'lname';
      $allowed[] = 'email';
      $allowed[] = 'pass';
      $allowed[] = 'pass2';

      $sent = array_keys($_POST);

      if ($allowed == $sent)
      {
        if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])
          && isset($_POST['pass']) && isset($_POST['pass2']))
        {
          // Check if the token from form matches the one saved in the session
          if (isset($_SESSION['token']) && $_POST['form'] != $_SESSION['token']) {
            $message = 'Something went wrong. Please try again.';
            $type = 'danger';
            $notification = new NotificationsView($message, $type);
            exit();
          }

          // Check if the email is valid
          if (!parent::isValidEmail($_POST['email'])) {
            $message = 'Incorrect email. Please provide a valid email';
            $type = 'danger';
            $notification = new NotificationsView($message, $type);
            exit();
          }

          // Check if passwords are matching
          if ($_POST['pass'] != $_POST['pass2']) {
            $message = 'Passwords are not matching. Please go back and try again.';
            $type = 'danger';
            $notification = new NotificationsView($message, $type);
            exit();
          }

          // User data
          $clean_fname  = parent::sanitizeString($_POST['fname']);
          $clean_lname  = parent::sanitizeString($_POST['lname']);
          $clean_email  = parent::sanitizeString($_POST['email']);
          $clean_pass   = parent::sanitizeString($_POST['pass']);
          $pass_hash    = parent::hashPassword($clean_pass);

          $userCollection = new UserCollection();

          $user = $userCollection->create();
          $user->setFirstName($clean_fname);
          $user->setLastName($clean_lname);
          $user->setEmail($clean_email);
          $user->setPassword($pass_hash);

          if ($user->register()) {
            $message = 'Congratulations! You\'ve successfully registered.';
            $type = 'success';
          } else {
            $message = 'Something went wrong! Please try again.';
            $type = 'danger';
          }
        }
        else
        {
          $message = 'Make sure you\'ve provided all information.
            Please go back and try again.';
          $type = 'danger';
        }
      }
      else
      {
        $message = 'Something went wrong. Please go back and try again.';
        $type = 'danger';
      }
    }
    $notification = new NotificationsView($message, $type);
  }
}

?>
