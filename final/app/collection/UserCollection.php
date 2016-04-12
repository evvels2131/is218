<?php
namespace app\collection;

use app\model\UserModel;

class UserCollection extends Collection
{
  // Create a new user model
  public function create()
  {
    $user = new UserModel;
    return $user;
  }
}

?>
