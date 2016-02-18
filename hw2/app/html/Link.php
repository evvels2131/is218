<?php
namespace app\html;

include_once('autoloadFunction.php');

// Link Class
class Link extends HTML
{
  public static function newLink($title, $href, $target)
  {
    $link = '<a href="' . $href . '" target="' . $target . '" title="' . $title . '"';

    return $link;
  }
}
?>
