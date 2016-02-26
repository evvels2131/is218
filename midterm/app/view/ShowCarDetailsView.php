<?php
namespace app\view;

use app\view\page\ShowCarDetailsPage;

class ShowCarDetailsView extends View
{
  public function __construct($array = '', $carID = '')
  {
    $showCarDetailsPage = new ShowCarDetailsPage($array, $carID);
  }
}
?>
