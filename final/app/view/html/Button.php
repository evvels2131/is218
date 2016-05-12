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

  public static function newButtonEdit($type, $name, $class, $text) 
  {
  	return '<button type="' . $type . '" name="' . $name . '" class="btn ' . $class . '">' . $text . '</button>';
  }
}

?>
