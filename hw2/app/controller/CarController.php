<?php
namespace app\controller;

use app\model\CarModel;
use app\view\CarView;
use app\html\Link;
use app\html\Paragraph;

// CarController for adding a new Car
class CarController extends Controller
{
  // Save a car if post request
  public static function post()
  {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];

    $car = new CarModel;

    $car->setMake($make);
    $car->setModel($model);
    $car->setYear($year);

    $car->save();

    Paragraph::newParagraph('Congratulations! You\'ve successfully added a new car!');

    echo Link::newLink('<< Back', 'index.php', '_self');
  }

  // Display a form or table if get request
  public function get($array = "")
  {
    if (is_array($array) && !empty($array))
    {
      if (count($array) == count($array, COUNT_RECURSIVE))
      {
        // If not multidimensional, it's most likely asking
        // for a single car

        echo Link::newLink('Return', 'index.php', '_self');
        echo '<br /><br />';

        // Display car details
        CarView::viewCarDetails($array);
      }
      else
      {
        // If it's multidimensional, it's most likely asking for
        // all cars

        // Show all cars
        CarView::viewCars($array);

        // Show a form to add a new car
        CarView::addNewCar();
      }
    }
  }
}
?>
