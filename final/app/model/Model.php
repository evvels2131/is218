<?php
namespace app\model;

use app\model\Database;

class Model
{
  public function __construct()
  {
    // Nothing here for now
  }

  // Check if user is logged in
  public function is_loggedin()
  {
    if (isset($_SESSION['user_session']))
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  // Log out
  public function logout()
  {
    session_unset();
    return true;
  }

}
?>
