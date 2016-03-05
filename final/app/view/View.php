<?php
namespace app\view;

use app\view\html\Link;

abstract class View
{
  public function htmlHeader($pageTitle)
  {
    $pageHTML = '
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UI-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>' . $pageTitle . '</title>
        <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
          crossorigin="anonymous">
      </head>
      <body>
        <nav class="navbar navbar-inverse">
          <div class="container">
            <a class="navbar-brand" href="index.php">IS-218</a>
            <ul class="nav navbar-nav">';
            if (isset($_SESSION))
            {
              $pageHTML .= '
                <li>' . Link::newLink('Home', 'index.php', '_self') . '</li>
                <li>' . Link::newLink('Users', 'index.php?page=users', '_self') . '</li>
            </ul>
            <p class="navbar-text navbar-right">Signed in as <b>'
              . $_SESSION['username'] . '</b></p>';
            }
            else
            {
              $pageHTML .= '<li>' . Link::newLink('Home', 'index.php', '_self') . '</li></ul>';
            }
            $pageHTML .= '
          </div>
        </nav>
        <div class="container">';

    return $pageHTML;
  }

  public function htmlDiv($content, $columns)
  {
    // Used to center content in bootstrap
    $side = (12 - $columns) / 2;

    $pageHTML = '
          <div class="row">
            <div class="col-md-' . $side . '"></div>
            <div class="col-md-' . $columns . '">' . $content . '</div>
            <div class="col-md-' . $side . '"></div>
          </div>';

    return $pageHTML;
  }

  // Options: success, info, warning, danger
  public function htmlAlertDiv($class, $content)
  {
    $htmlAlert = '<div class="alert alert-' . $class . '">' . $content . '</div>';

    return $htmlAlert;
  }

  public function htmlFooter()
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
