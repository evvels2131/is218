<?php
namespace app\controller;

use app\view\HomePageView;
use app\model\UserModel;
use app\view\NotificationsView;
use app\model\Database;

class HomePageController extends Controller
{
  public function get()
  {
    // Delete the session if logout button clicked
    if (isset($_GET['logout']))
    {
      session_unset();
      unset($_SESSION['user_session']);
      unset($_SESSION['user_fname']);
      unset($_SESSION['user_lname']);

      header('Location: index.php');
    }

    $db = new Database();
    $cars = $db->getCars();

    $homePageView = new HomePageView($cars);
  }

  public function post()
  {
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
