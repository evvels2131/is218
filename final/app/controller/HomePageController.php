<?php
namespace app\controller;

use app\view\HomePageView;
use app\model\UserModel;
use app\view\NotificationsView;

class HomePageController extends Controller
{
  public function get()
  {
    if (isset($_GET['logout']))
    {
      session_unset();
      unset($_SESSION['user_session']);
      unset($_SESSION['user_fname']);
      unset($_SESSION['user_lname']);

      header('Location: index.php');
    }

    $homePageView = new HomePageView();
  }

  public function post()
  {
    if (isset($_POST['email']) && isset($_POST['password']))
    {
      $email = parent::sanitizeString($_POST['email']);
      $password = parent::sanitizeString($_POST['password']);

      $user = new UserModel();
      $user->setEmail($email);
      $user->setPassword($password);

      if ($user->login() == true)
      {
        $result = 'Congratulations! You have successfully logged in.';
        $notificationsView = new NotificationsView($result);
      }
      else
      {
        $result = 'Oops! Incorrect password or email. <br />Please try again.';
        $notificationsView = new NotificationsView($result);
      }
    }
    else
    {
      echo 'Email or password missing.';
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
