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

  // Password hashing
  public function hashPassword($password)
  {
    return password_hash($password, PASSWORD_BCRYPT);
  }

  public function saveFile()
  {
    $name     = $_FILES['file']['name'];
    $tmpName  = $_FILES['file']['tmp_name'];
    $error    = $_FILES['file']['error'];
    $size     = $_FILES['file']['size'];
    $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    switch ($error)
    {
      case UPLOAD_ERR_OK:
        $valid = true;
        // validate file extensions
        if (!in_array($ext, array('jpg', 'jpeg', 'png', 'gif', 'csv')))
        {
          $valid = false;
          $response = 'Invalid file extension';
        }
        // validate file size
        if ($size/1024/1024 > 4)
        {
          $valid = false;
          $response = 'File size is exceeding maximum allowed size';
        }
        // upload file
        if ($valid)
        {
          $targetPath = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'uploads' .
            DIRECTORY_SEPARATOR . $name;
          move_uploaded_file($tmpName, $targetPath);
          $response = 'File uploaded successfully.';
        }
        break;
      case UPLOAD_ERR_INI_SIZE:
        $response = 'The uploaded file exceeds the upload_max_filesize directive
          in php.ini';
        break;
      case UPLOAD_ERR_FORM_SIZE:
        $response = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was
          specified in the HTML form';
        break;
      case UPLOAD_ERR_PARTIAL:
        $response = 'The uploaded file was only partially uploaded';
        break;
      case UPLOAD_ERR_NO_FILE:
        $response = 'No file was uploaded';
        break;
      case UPLOAD_ERR_NO_TMP_DIR:
        $response = 'Missing a temporary folder';
        break;
      case UPLOAD_ERR_CANT_WRITE:
        $response = 'Failed to write to disk';
        break;
      case UPLOAD_ERR_EXTENSION:
        $response = 'File uploaded stopped by extension';
        break;
      default:
        $response = 'Unknown error';
        break;
    }

    return $response;
  }
}

?>
