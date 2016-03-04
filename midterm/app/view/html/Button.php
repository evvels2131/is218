<?php
namespace app\view\html;

class Button extends HTML
{
  public static function newButton($type, $name = '', $class, $text)
  {
    $buttonHTML = '<button type="' . $type . '" name="' . $name . '"
      class="btn ' . $class . '">' . $text . '</button>';

    return $buttonHTML;
  }
}


?>
