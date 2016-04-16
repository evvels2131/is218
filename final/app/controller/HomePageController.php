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
      $_SESSION = array();
      session_destroy();
      $message = 'You have successfully been logged out.';
      $type = 'success';
      $notificationView = new NotificationsView($message, $type);
      exit();
    }

    $carCollection = new CarCollection();
    $carCollection->setLimit(7);

    $starting_position = 0;
    if (isset($_GET['page_no']))
    {
      $page_no = $_GET['page_no'];
      $starting_position = ($_GET['page_no'] - 1) * $carCollection->getLimit();
    } else {
      $page_no = '';
    }
    $carCollection->setStartingPosition($starting_position);

    $amountOfPages = 0;

    if ($carCollection->getAmountOfPages() != false) {
      $amountOfPages = $carCollection->getAmountOfPages();
    }
    
    $cars = array();

    if ($carCollection->populateCollection()) {
      $cars = $carCollection->getCars();
    }

    $homePageView = new HomePageView($cars, $amountOfPages, $page_no);
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
