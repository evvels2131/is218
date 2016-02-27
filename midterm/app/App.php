<?php
namespace app;

use app\controller\CarController;
use app\controller\HomePageController;
use app\controller\ShowCarsPageController;
use app\controller\AddCarController;
use app\controller\ShowCarDetailsController;

class App
{
  public function __construct()
  {
    // Array for session, get, and post
    isset($_SESSION) ? $session_array = $_SESSION : $session_array = '';
    isset($_GET) ? $get_array = $_GET : $get_array = '';
    isset($_POST) ? $post_array = $_POST : $post_array = '';

    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
      switch ($_GET['page'])
      {
        case 'addcar':
          $addCarController = new AddCarController;
          break;
        case 'car':
          $showCarDetailsController =
            new ShowCarDetailsController($session_array, $get_array);
          break;
        default:
          $homePageController = new HomePageController($session_array);
      }
    }
    else
    {
      $carController = new CarController($post_array);
    }
  }
}

?>
