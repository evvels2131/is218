<?php
namespace app\controller;

use app\view\SignupPageView;

class SignupPageController extends Controller
{

  public function get()
  {
    $signupPageView = new SignupPageView();
  }

  public function post()
  {
    $firstname  = $_POST['fname'];
    $lastname   = $_POST['lname'];
    $email      = $_POST['email'];
    $password   = $_POST['pass'];
    $password2  = $_POST['pass2'];

    // Redirect
    if (headers_sent()) {
      echo '<h1><a href="index.php">Home</a></h1>';
      die('Redirect failed. Please go back to the home page.');
    } else {
      exit(header('Location: index.php'));
    }
  }
}

?>
