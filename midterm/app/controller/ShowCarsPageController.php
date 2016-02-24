<?php
namespace app\controller;

use app\view\page\ShowCarsPage;

class ShowCarsPageController extends Controller
{
  public function post()
  {
    echo '<h1>ShowCarsPageController</h1>';
    echo 'This is the <b>post()</b> function<br /><br />';
  }

  public function get()
  {
    echo '<h1>ShowCarsPageController</h1>';
    echo 'This is the <b>get()</b> function<br /><br />';
  }
}


?>
