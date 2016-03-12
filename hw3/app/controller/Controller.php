<?php
namespace app\controller;

abstract class Controller
{
    public function saveImage()
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
          if (!in_array($ext, array('jpg', 'jpeg', 'png', 'gif')))
          {
            $valid = false;
            $response = 'Invalid file extension';
          }
          // validate file size
          if ($size/1024/1024 > 2)
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

            if (isset($_POST['image']) && !empty($_POST['image']))
            {
              unlink($_POST['image']);
            }

            $response = 'uploads/' . $name;

            //header('Location: index.php');
            //exit;
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

    public function deleteImage()
    {
      $filePath = $_POST['image'];

      if (file_exists($filePath))
      {
        unlink($filePath);
      }
    }
}

?>
