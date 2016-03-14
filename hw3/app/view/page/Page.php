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
              <li>' . Link::newLink('Import CSV File', 'index.php?page=importcsv', '_self') . '</li> 
            </ul>
          </div>
        </nav>
        <div class="container">';

      return $pageHTML;
    }

    // Bootstrap row
    public function htmlDiv($content, $columns)
    {
      // Center the column in Bootstrap
      $side = (12 - $columns) / 2;

      $pageHTML = '
        <div class="row">
          <div class="col-md-' . $side . '"></div>
          <div class="col-md-' . $columns . '">' . $content . '</div>
          <div class="col-md-' . $side . '"></div>
        </div>';

      return $pageHTML;
    }

    // Bootstrap alert div tags
    public function htmlAlertDiv($class, $content)
    {
      $htmlAlert = '<div class="alert alert-' . $class . '">' . $content . '</div>';

      return $htmlAlert;
    }

    // Bootstrap wells
    public function htmlWell($class, $content)
    {
      $wellHTML = '<div class="well well-' . $class . '">' . $content . '</div>';

      return $wellHTML;
    }

    public function getFooter()
    {
      $pageHTML = '
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
