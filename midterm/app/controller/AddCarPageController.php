<?php
namespace app\controller;

use app\view\page\AddCarPage;

class AddCarPageController extends Controller
{
  public function post()
  {
    echo '<h1>AddCarPageControlller</h1>';
    echo 'This is the <b>post()</b> function<br /><br />';
  }

  public function get()
  {
    echo '<h1>AddCarPageController</h1>';
    echo 'This is the <b>get()</b> function<br /><br />';
    $addCar = new AddCarPage;
    $addCar->get();
  }
}

?>
