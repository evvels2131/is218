<?php
namespace app\controller;

use app\view\HomePageView;

class HomePageController extends Controller
{
  public function get()
  {
    $homePageView = new HomePageView();
  }

  public function post()
  {
    $email = $_POST['email'];
    $password = $_POST['password'];

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
