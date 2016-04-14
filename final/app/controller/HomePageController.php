<?php
namespace app\controller;

use app\view\HomePageView;
use app\view\NotificationsView;
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
      $type = 'success';
      $notificationView = new NotificationsView($message, $type);
      exit();
    }

    $carCollection = new CarCollection();
    $carCollection->setLimit(4);

    $starting_position = 0;
    if (isset($_GET['page_no']))
    {
      $starting_position = ($_GET['page_no'] - 1) * $carCollection->getLimit();
    }
    $carCollection->setStartingPosition($starting_position);

    $amountOfPages = $carCollection->getAmountOfPages();
    $carCollection->populateCollection();

    $homePageView = new HomePageView($carCollection->getCars(), $amountOfPages);
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
