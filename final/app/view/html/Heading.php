<?php
namespace app\view\html;

class Heading extends HTML
{
  public static function newHeading($type, $title)
  {
    $htmlHeading = '<' . $type . '>' . $title . '</' . $type . '>';

    return $htmlHeading;
  }
}

?>
