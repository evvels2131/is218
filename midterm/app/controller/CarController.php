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

    if (isset($_POST['id']))
    {
      $id = $_POST['id'];
      $car = new CarModel($id);
    }
    else
    {
      $car = new CarModel;
    }

    $car->setMake($make);
    $car->setModel($model);
    $car->setYear($year);

    $car->save();

    echo '<h2>You have successfully added a new car.</h2>';
    //header('Location: ./index.php');
  }
}
?>
