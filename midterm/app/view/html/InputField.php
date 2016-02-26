<?php
namespace app\view\html;

class InputField extends HTML
{
  public static function newInputField($type, $name = "", $value)
  {
    if (empty($name))
    {
      $input = '<input type="' . $type . '" value="' . $value .  '"><br />';
    }
    else {
      $input = '<input type="' . $type . '" name="' . $name . '" value="' . $value .  '"><br />';
    }

    return $input;
  }
}
?>
