<?php
namespace app\controller;

use app\view\HomePageView;
use app\view\NotificationsView;
use app\model\UserModel;
use app\model\Database;

use app\collection\CarCollection;

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

      $message = 'You have successfully been logged out.';
      $notificationView = new NotificationsView($message);
    }
    else
    {
      $carCollection = new CarCollection();
      $carCollection->populateCollection();

      $homePageView = new HomePageView($carCollection->getCars());
    }
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
