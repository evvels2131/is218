<?php
namespace app\html;

// Link Class
class Paragraph extends HTML
{
  public static function newParagraph($text)
  {
    $paragraph = '<p>' . $text . '</p>';

    echo $paragraph;
  }
}
?>
