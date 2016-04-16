<?php
namespace app\controller;

use app\view\ConfirmationView;

class ConfirmationController extends Controller
{
  public function get()
  {
    $confirmationView = new ConfirmationView();
  }

  public function post()
  {

  }
}
?>
