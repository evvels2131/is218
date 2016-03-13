<?php
namespace app;

use app\controller\CarController;
use app\controller\HomePageController;
use app\controller\ShowCarsPageController;
use app\controller\AddCarController;
use app\controller\ShowCarDetailsController;
use app\controller\EditCarController;
use app\controller\ImportCSVController;

class App
{
  public function __construct()
  {
    $request_method = $_SERVER['REQUEST_METHOD'];
    switch ($_GET['page'])
    {
      case 'addcar':
        $addCarController = new AddCarController;
        $addCarController->$request_method();
        break;
      case 'car':
        $showCarDetailsController = new ShowCarDetailsController();
        $showCarDetailsController->$request_method();
        break;
      case 'editcar':
        $editCarController = new EditCarController;
        $editCarController->$request_method();
        break;
      case 'importcsv':
        $importCSVController = new ImportCSVController;
        $importCSVController->$request_method();
        break;
      default:
        $homePageController = new homePageController;
        $homePageController->$request_method();
    }
  }
}

?>
