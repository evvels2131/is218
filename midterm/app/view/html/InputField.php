<?php
namespace app\view\html;

class InputField extends HTML
{
  public static function newInputField($type, $name = '', $value,
    $readonly = '', $placeholder = '')
  {
    if (empty($name) && empty($disabled))
    {
      $input = '<input type="' . $type . '" value="' . $value .  '"><br />';
    }
    else if (!empty($placeholder))
    {
      $input = '<input type="' . $type . '" name="' . $name . '" placeholder="' .
        $value .  '"' . $readonly . '><br />';
    }
    else
    {
      $input = '<input type="' . $type . '" name="' . $name . '" value="' .
        $value .  '"' . $readonly . '><br />';
    }

    return $input;
  }
}
?>
