<?php
namespace app\view\html;

class Button extends HTML
{
  public static function newButton($type, $class, $text)
  {
    $buttonHTML = '<button type="' . $type . '"
      class="btn ' . $class . '">' . $text . '</button>';

    return $buttonHTML;
  }
}

?>
