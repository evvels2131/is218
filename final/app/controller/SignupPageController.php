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
    $success = true;

    if ($_POST['form'] && empty($_POST['hpt']))
    {
      $allowed = array();
      $allowed[] = 'form';
      $allowed[] = 'hpt';
      $allowed[] = 'fname';
      $allowed[] = 'lname';
      $allowed[] = 'email';
      $allowed[] = 'pass';
      $allowed[] = 'pass2';
      $allowed[] = 'captcha';

      $sent = array_keys($_POST);

      if ($allowed == $sent)
      {
        if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])
          && isset($_POST['pass']) && isset($_POST['pass2']))
        {
          // Check if the captcha field is correct
          if (isset($_POST['captcha']) && $_POST['captcha'] != $_SESSION['digit']) {
            $message = 'Something went wrong. Please make sure you are providing correct
              information.';
            $success = false;
          }

          // Check if the token from form matches the one saved in the session
          if (isset($_SESSION['token']) && $_POST['form'] != $_SESSION['token']) {
            $message = 'Something went wrong. Please try again.';
            $success = false;
          }

          // Check if the email is valid
          if (!parent::isValidEmail($_POST['email'])) {
            $message = 'Incorrect email. Please provide a valid email';
            $success = false;
          }

          // Check if passwords are matching
          if ($_POST['pass'] != $_POST['pass2']) {
            $message = 'Passwords are not matching. Please go back and try again.';
            $success = false;
          }

          // If the checks fail
          if (!$success) {
            $notification = new NotificationsView($message, 'danger');
            session_destroy();
            exit();
          }

          // User data
          $clean_fname  = parent::sanitizeString($_POST['fname']);
          $clean_lname  = parent::sanitizeString($_POST['lname']);
          $clean_email  = parent::sanitizeString($_POST['email']);
          $clean_pass   = parent::sanitizeString($_POST['pass']);
          $pass_hash    = parent::hashPassword($clean_pass);

          $userCollection = new UserCollection();
          $conf_code = md5(uniqid(rand()));

          $user = $userCollection->create();
          $user->setConfirmationCode($conf_code);
          $user->setFirstName($clean_fname);
          $user->setLastName($clean_lname);
          $user->setEmail($clean_email);
          $user->setPassword($pass_hash);

          if ($user->register()) {
            $message = 'Congratulations! You\'ve successfully registered.<br />';
            $success = true;

            // Send confirmation email
            $to = $clean_email;
            $subject = 'Thank you for signing up! Please confirm your email address.';
            $header = 'From: Tomasz <tg77@njit.edu>';

            $url = 'https://web.njit.edu/~tg77/is218/final/index.php?page=confirmation&confirm_code=' . $conf_code;

            $msg = 'Your Confirmation Link
              Click on this link to activate your account:
              ' . $url . '.
              Thank you for registering.';

            $sendmail = mail($to, $subject, $msg, $header);

            if ($sendmail) {
              $message .= 'Your confirmation link has been sent to your email address.<br />
                Please confirm your email before logging in.';
            } else {
              $message .= 'Could not send confirmation link to your e-mail address';
            }
          } else {
            $message = 'Something went wrong! Please try again.';
            $success = false;
          }
        }
        else
        {
          $message = 'Make sure you\'ve provided all information.
            Please go back and try again.';
          $success = false;
        }
      }
      else
      {
        $message = 'Something went wrong. Please go back and try again.';
        $success = false;
      }
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
