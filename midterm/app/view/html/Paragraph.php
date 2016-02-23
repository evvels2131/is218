<?php
namespace app\view\html;

class Paragraph extends HTML
{
  public static function newParagraph($text)
  {
    $paragraph = '<p>' . $text . '</p>';

    echo $paragraph;
  }
}

?>
