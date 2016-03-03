<?php
namespace app\view;

use app\view\page\EditCarPage;

class EditCarView extends View
{
  public function __construct($array = '', $carID = '')
  {
    $editCarPage = new EditCarPage($array, $carID);
  }
}


?>
