<?php
namespace app;

use app\controller\HomePageController;
use app\controller\SignupPageController;
use app\controller\ProfilePageController;

class App
{
  public function __construct()
  {
    $request_method = $_SERVER['REQUEST_METHOD'];

    if (!isset($_GET['page']))
    {
      $homePageController = new HomePageController();
      $homePageController->$request_method();
    }
    else
    {
      switch ($_GET['page'])
      {
        case 'signup':
          $signupPageController = new SignupPageController();
          $signupPageController->$request_method();
          break;
        case 'profile':
          $profileController = new ProfilePageController();
          $profileController->$request_method();
          break;
      }
    }
  }
}

?>
