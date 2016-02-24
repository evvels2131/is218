<?php
namespace app\controller;

use app\view\page\HomePage;

class HomePageController extends Controller
{
  public function post()
  {
    echo '<h1>HomePageController</h1>';
    echo '<b>HomePageController</b> this is the <b>post()</b>';
  }

  public function get()
  {
    echo '<h1>HomePageController</h1>';
    echo '<b>HomePageController</b> this is a <b>get()</b><br /><br />';
  }
}

?>
