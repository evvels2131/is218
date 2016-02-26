<?php
namespace app\controller;

use app\model\CarModel;

class CarController extends Controller
{
  // Add a new car
  public function post($post_array = '')
  {
    $make   = $_POST['make'];
    $model  = $_POST['model'];
    $year   = $_POST['year'];

    if (isset($_POST['guid']))
    {
      $id = $_POST['guid'];
      $car = new CarModel($id);
    }
    else
    {
      $car = new CarModel;
    }

    $car->setMake($make);
    $car->setModel($model);
    $car->setYear($year);

    if (isset($_POST['delete']))
    {
      $car->delete();
    }
    else
    {
      $car->save();
    }

    echo '<h2>Success.</h2>';
    //header('Location: ./index.php');
  }
}
?>
