<?php
namespace app\view\html;

class Heading extends HTML
{
  public static function newHeading($type = '', $title = '')
  {
    switch ($type)
    {
      case 'h1':
        $htmlHeading = '<h1>' . $title . '</h1>';
        break;
      case 'h2':
        $htmlHeading = '<h2>' . $title . '</h2>';
        break;
      case 'h3':
        $htmlHeading = '<h3>' . $title . '</h3>';
        break;
      case 'h4':
        $htmlHeading = '<h4>' . $title . '</h4>';
        break;
      case 'h5':
        $htmlHeading = '<h5>' . $title . '</h5>';
        break;
      case 'h6':
        $htmlHeading = '<h6>' . $title . '</h6>';
        break;
    }
    return $htmlHeading;
  }
}
?>
