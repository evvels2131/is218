<?php
namespace app\view\page;

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
            <a class="navbar-brand" href="index.php">IS 218</a>
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="index.php?page=addcar">Add New Car</a></li>
            </ul>
          </div>
        </nav>
        <div class="container">
          <div class="row">
            <div class="col-md-8">';

      return $pageHTML;
    }

    public function getFooter()
    {
      $pageHTML =
            '</div>
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
}

?>
