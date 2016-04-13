<?php
namespace app\controller;

abstract class Controller
{
  // Remove potentially malicious code or tags from user input
  public function sanitizeString($string)
  {
    $string = strip_tags($string);
    $string = htmlentities($string);
    $string = stripslashes($string);
    return $string;
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

      $response = json_decode($output, true);

      return $response;
    }
    catch (Exception $e)
    {
      echo 'API Error: ' . $e->getMessage();
    }
  }
}

?>
