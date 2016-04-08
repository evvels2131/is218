<?php
namespace app\controller;

use app\view\SignupPageView;
use app\model\UserModel;
use app\view\ErrorPageView;

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
    }
    else
    {
      $error_info = 'Something went wrong!';
      $errorPageView = new ErrorPageView($error_info);
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
