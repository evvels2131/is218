<?php
namespace app\controller;

use app\view\SignupPageView;
use app\model\UserModel;
use app\view\NotificationsView;

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
      $firstname  = $_POST['fname'];
      $lastname   = $_POST['lname'];
      $email      = $_POST['email'];
      $password   = $_POST['pass'];
      $password2  = $_POST['pass2'];

      $user = new UserModel();
      $user->setFirstName($firstname);
      $user->setLastName($lastname);
      $user->setEmail($email);
      $user->setPassword($password);

      if ($user->register() == true)
      {
        $result = 'Cogratulations! You\'ve successfully registered.';
        $notificationsView = new NotificationsView($result);
      }
      else
      {
        $result = 'Oops! Something went wrong.<br />' . 'Please try again.';
        $notificationsView = new NotificationsView($result);
      }
    }
    else
    {
      $result = 'Oops! Something went wrong.<br />' . 'Please try again.';
      $notificationsView = new NotificationsView($result);
    }

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
