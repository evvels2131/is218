<?php
include_once('autoloadFunction.php');

// Link Class
class Link
{
  public static function newLink($title, $href, $target)
  {
    $link = '<a href="' . $href . '" target="' . $target . '" title="' . $title . '"';

    return $link;
  }
}
?>
