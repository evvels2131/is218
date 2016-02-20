<?php
namespace app\html;

// Link Class
class Link extends HTML
{
  public static function newLink($title, $href, $target)
  {
    $link = '<a href="' . $href . '" target="' . $target . '">' . $title . '</a>';

    return $link;
  }
}
?>
