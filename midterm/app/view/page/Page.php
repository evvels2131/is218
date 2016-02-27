<?php
namespace app\view\page;

use app\view\html\Link;

abstract class Page
{
  public function getHeader($title)
  {
    $pageHTML =
    //$this->_html =
     '<!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UI-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>' . $title . '</title>
        <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
          crossorigin="anonymous">
      </head>
      <body>
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php">IS-218</a>
            <ul class="nav navbar-nav">
              <li>' . Link::newLink('Home', 'index.php', '_self') . '</li>
              <li>' . Link::newLink('Add New Car', 'index.php?page=addcar', '_self') . '</li>
            </ul>
          </div>
        </nav>
        <div class="container">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">';

      return $pageHTML;
    }

    public function getFooter()
    {
      $pageHTML =
            '</div>
             <div class="col-md-2"></div>
          </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
			  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
				  integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
				  crossorigin="anonymous"></script>
      </body>
      </html>';

      return $pageHTML;
  }

  public function formDiv($form)
  {
    $formHTML = '<div class="col-md-4">' . $form . '</div>';

    return $formHTML;
  }

  public function alertDiv($alert, $content)
  {
    switch ($alert)
    {
      case 'success':
        $divHTML = '<div class="alert alert-success">' . $content . '</div>';
        break;
      case 'info':
        $divHTML = '<div class="alert alert-info">' . $content . '</div>';
        break;
      case 'warning':
        $divHTML = '<div class="alert alert-warning">' . $content . '</div>';
        break;
      case 'danger':
        $divHTML = '<div class="alert alert-danger">' . $content . '</div>';
        break;
    }

    return $divHTML;
  }
}

?>
