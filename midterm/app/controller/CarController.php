<?php
namespace app\controller;

use app\view\page\AboutPage;
use app\view\page\HomePage;
use app\view\page\AddCarPage;
use app\model\CarModel;

class CarController extends Controller
{
  public function post()
  {
    $make   = $_POST['make'];
    $model  = $_POST['model'];
    $year   = $_POST['year'];

    $car = new CarModel;

    $car->setMake($make);
    $car->setModel($model);
    $car->setYear($year);

    $car->save();

    header('Location: ./index.php');
  }

  public function get($page = "")
  {
    if (!empty($page))
    {
      if ($page == 'about')
      {
        $about = new AboutPage;
        $about->get();
      }
      else if ($page == 'addcar')
      {
        $addCar = new AddCarPage;
        $addCar->get();
      }
    }
    else
    {
      $home = new HomePage;
      $home->get();
    }
  }
}

?>
