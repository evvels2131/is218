<?php
namespace app\view\html;

class Link extends HTML
{
  public static function newLink($title, $href, $target)
  {
    $link = '<a href="' . $href . '" target="' . $target . '">' . $title . '</a>';

    return $link;
  }
}

?>
