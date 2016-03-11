<?php
namespace app\view\html;

class Button extends HTML
{
  public static function newButton($type, $name = '', $class, $text)
  {
    if (!empty($type) && !empty($name) && !empty($class) && !empty($text))
    {
      $buttonHTML = '<button type="' . $type . '" name="' . $name . '"
        class="btn btn-' . $class . '">' . $text . '</button>';
    }
    else
    {
      $buttonHTML = '<button type="' . $type . '" class="btn btn-' . $class . '">'
        . $text . '</button>';
    }

    return $buttonHTML;
  }
}


?>
