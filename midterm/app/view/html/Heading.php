<?php
namespace app\view\html;

class Heading extends HTML
{
  public static function newHeading($type = '', $text = '')
  {
    switch ($type)
    {
      case 'h1':
        $htmlHeading = '<h1>' . $title . '</h1>';
        break;
    }
  }
}

?>
