<?php

// Show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/////////////////////

// Link Class
class Link
{
  public static function newLink($title, $href, $target)
  {
    $link = '<a href="' . $href . '" target ="' . $target . '">' . $title . '</a>';
    return $link;
  }
}

$link = Link::newLink('Google', 'http://www.google.com', '_BLANK');
echo $link;
?>
