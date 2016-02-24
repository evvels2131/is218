<?php
namespace app\controller;

use app\view\page\AboutPage;
use app\view\page\HomePage;
use app\view\page\AddCarPage;

class CarController extends Controller
{
  public function post()
  {

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
