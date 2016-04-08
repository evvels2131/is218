<?php
namespace app;

use app\controller\HomePageController;
use app\controller\SignupPageController;

class App
{
  public function __construct()
  {
    $request_method = $_SERVER['REQUEST_METHOD'];

    switch ($_GET['page'])
    {
      case 'signup':
        $signupPageController = new SignupPageController();
        $signupPageController->$request_method();
        break;
      default:
        $homePageController = new HomePageController();
        $homePageController->$request_method();
    }
  }
}

?>
