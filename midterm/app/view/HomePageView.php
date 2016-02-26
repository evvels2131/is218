<?php
namespace app\view;

use app\view\page\HomePage;

class HomePageView extends View
{
  public function __construct($array = '')
  {
    $homePage = new HomePage($array);
  }
}

?>
