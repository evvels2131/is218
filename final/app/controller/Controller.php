<?php
namespace app\controller;

abstract class Controller
{
  // Remove potentially malicious code or tags from user input
  public function sanitizeString($string)
  {
    $string = htmlspecialchars($string);
    $string = strip_tags($string);
    $string = stripslashes($string);
    return $string;
  }

  // Check if email is valid
  public function isValidEmail($email)
  {
    $email_pattern = '/^[^@\s<&>]+@([-a-z0-9]+\.)+[a-z]{2,}$/i';

    if (preg_match($email_pattern, $email)) {
      return true;
    } else {
      return false;
    }
  }

  // Get detailed information about a specific car
  public function getCarsDetails($vin)
  {
    $api_key = 'u48d7aetdk4yz6pwqnzd62ez';
    $url = 'https://api.edmunds.com/api/vehicle/v2/vins/' . $vin .
      '?fmt=json&api_key=' . $api_key;

    try
    {
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      $output = curl_exec($ch);
      curl_close($ch);

      $response = json_decode($output);

      return $response;
    }
    catch (Exception $e)
    {
      echo 'API Error: ' . $e->getMessage();
    }
  }
}

?>
