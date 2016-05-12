<?php
namespace app\controller;

use app\view\AddCarView;
use app\view\NotificationsView;
use app\collection\CarCollection;

class AddCarPageController extends Controller
{
  public function get()
  {
    if (isset($_SESSION['user_session'])
      && $_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']))
    {
      $addCarView = new AddCarView();
    }
    else
    {
      $result = 'Oops! Something went wrong. <br />Please make sure you\'re logged in.';
      $type = 'danger';
      $notificationsView = new NotificationsView($result, $type);
    }

  }

  public function post()
  {
    $success = true;

    if ($_POST['form'])
    {
      $allowed = array();
      $allowed[] = 'form';
      $allowed[] = 'vin';
      $allowed[] = 'price';
      $allowed[] = 'condition';

      $sent = array_keys($_POST);

      if ($allowed == $sent)
      {
        if (isset($_POST['form']) && isset($_POST['vin']) && isset($_POST['price'])
          && isset($_POST['condition']) && isset($_FILES['file']) && $_FILES['file']['size'] > 0)
        {
          // Check if the toekn from form matches the one saved in the session
          if (isset($_SESSION['token']) && $_POST['form'] != $_SESSION['token']) {
            $message = 'Something went wrong. Please try again.';
            $success = false;
          }

          // Grab details from the API
          $clean_vin  = parent::sanitizeString($_POST['vin']);
          $carDetails = parent::getCarsDetails($clean_vin);

          // If the reponse from the API is an error
          if (isset($carDetails->errorType) && $carDetails->errorType == 'INCORRECT_PARAMS' ||
            isset($carDetails->status) && $carDetails->status == 'NOT_FOUND') {
            $message = 'Oops! Something went wrong! Please try again with a different VIN.';
            $success = false;
          }

          // If the checks fail
          if (!$success) {
            $notification = new NotificationsView($message, 'danger');
            unset($_SESSION['token']);
            unset($_SESSION['digit']);
            exit();
          }

          // Variables
          $clean_price  = parent::sanitizeString($_POST['price']);
          $clean_cond   = parent::sanitizeString($_POST['condition']);

          // Save the picture
          parent::saveFile();
          $path = 'uploads/' . $_FILES['file']['name'];

          $carCollection = new CarCollection();

          $car = $carCollection->create();
          $car->setVin($clean_vin);
          $car->setMake($carDetails->make->name);
          $car->setModel($carDetails->model->name);
          $car->setYear($carDetails->years[0]->year);
          $car->setPrice($clean_price);
          $car->setCondition($clean_cond);
          $car->setImageUrl($path);
          $car->setCreatedBy($_SESSION['user_session']);

          if ($car->save()) {
            $message = 'Congratulations! You\'ve successfully added a new car.';
            $success = true;
          } else {
            $message = 'Could not save the car right now. Please try again later.';
            $success = false;
          }
        }
        else
        {
          $message = 'Something is missing. Please make sure you\'ve specified
            all input fields';
          $success = false;
        }
      }
      else
      {
        $message = 'Something went wrong. Please try again.';
        $success = false;
      }
    }
    else
    {
      $message = 'Something went wrong. Please try again.';
      $success = false;
    }

    unset($_SESSION['token']);
    unset($_SESSION['digit']);

    if ($success) {
      $type = 'success';
    } else {
      $type = 'danger';
    }

    $notification = new NotificationsView($message, $type);
  }
}

?>
