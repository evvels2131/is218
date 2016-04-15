<?php
namespace app;

session_start();

// Session fixation and hijacking
if (isset($_SESSION['HTTP_USER_AGENT']))
{
  if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT']))
  {
    header('Location: index.php?page=login');
    exit();
  }
}

use app\controller\HomePageController;
use app\controller\SignupPageController;
use app\controller\ProfilePageController;
use app\controller\AddCarPageController;
use app\controller\LoginPageController;
use app\controller\CarDetailsController;

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
        case 'addcar':
          $addcarController = new AddCarPageController();
          $addcarController->$request_method();
          break;
        case 'login':
          $loginPageController = new LoginPageController();
          $loginPageController->$request_method();
          break;
        case 'cardetails':
          $carDetailsController = new CarDetailsController();
          $carDetailsController->$request_method();
          break;
      }
    }
  }
}

?>
