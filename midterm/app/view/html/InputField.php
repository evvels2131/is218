<?php
namespace app\view\html;

class InputField extends HTML
{
  public static function newInputField($type, $name = '', $value, $disabled = '')
  {
    if (empty($name) && empty($disabled))
    {
      $input = '<input type="' . $type . '" value="' . $value .  '"><br />';
    }
    else
    {
      $input = '<input type="' . $type . '" name="' . $name . '" value="' . $value .  '"' . $disabled . '><br />';
    }

    return $input;
  }
}
?>
