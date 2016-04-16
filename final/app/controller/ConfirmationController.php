<?php
namespace app\controller;

use app\view\NotificationsView;
use app\collection\UserCollection;

class ConfirmationController extends Controller
{
  public function get()
  {
    $userCollection = new UserCollection();
    $user = $userCollection->create();

    if (isset($_GET['confirm_code']) && !empty($_GET['confirm_code']))
    {
      $confirm_code = parent::sanitizeString($_GET['confirm_code']);
      $user->setConfirmationCode($confirm_code);
      if ($user->confirmUser())
      {
        $message = 'You email address have been successfully confirmed. <br />
          Please go ahead and log in to your account.';
        $success = true;
      } else {
        $message = 'We could not confirm your email address at the moment.';
        $success = false;
      }
    } else {
      $message = 'Go back to the homepage. Nothing to see here';
      $success = false;
    }

    if ($success) {
      $type = 'success';
    } else {
      $type = 'danger';
    }

    $notification = new NotificationsView($message, $type);
  }

  public function post()
  {

  }
}
?>
