<?php
namespace app\controller;

use app\view\EditCarView;

class EditCarController extends Controller
{
  public function __construct($session_array = '', $get_array = '')
  {
    $editCarView = new EditCarView($session_array, $get_array);
  }
}

?>
