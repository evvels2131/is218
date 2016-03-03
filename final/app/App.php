<?php
namespace app;

use app\controller\HomePageController;

class App
{
  public function __construct()
  {
    // Check if session is set
    if (isset($_SESSION)) $session_array = $_SESSION;

    // Display appropriate views based on the request method
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
      switch ($_GET['page'])
      {
        case 'about':
          $aboutPageController = new AboutPageController;
          break;
        default:
          $homePageController = new HomePageController;
      }
    }
    else
    {
      // controller->post();
    }
  }
}

?>
