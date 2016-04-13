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
    if (isset($_POST) && !empty($_POST))
    {
      $firstname  = parent::sanitizeString($_POST['fname']);
      $lastname   = parent::sanitizeString($_POST['lname']);
      $email      = parent::sanitizeString($_POST['email']);
      $password   = parent::sanitizeString($_POST['pass']);
      $password2  = parent::sanitizeString($_POST['pass2']);

      $userCollection = new UserCollection();
      $user = $userCollection->create();

      $user->setFirstName($firstname);
      $user->setLastName($lastname);
      $user->setEmail($email);
      $user->setPassword($password);

      if ($user->register() == true)
      {
        $result = 'Cogratulations! You\'ve successfully registered.';
        $type = 'success';
      }
      else
      {
        $result = 'Oops! Something went wrong.<br />' . 'Please try again.';
        $type = 'danger';
      }
    }
    else
    {
      $result = 'Oops! Something went wrong.<br />' . 'Please try again.';
      $type = 'danger';
    }

    $notificationsView = new NotificationsView($result, $type);

    // Redirect
    /*if (headers_sent()) {
      echo '<h1><a href="index.php">Home</a></h1>';
      die('Redirect failed. Please go back to the home page.');
    } else {
      exit(header('Location: index.php'));
    }*/
  }
}

?>
