<?php
namespace app\view\html;

class InputField extends HTML
{
  public static function newInputField($type, $name = '', $value,
    $readonly = '', $placeholder = '')
  {
    if (!empty($readonly))
    {
      $input = '<input type="' . $type . '" name="' . $name . '"
        value="' . $value . '" readonly>';
    }
    else if (!empty($placeholder))
    {
      $input = '<input type="' . $type . '" name="' . $name . '"
        placeholder="' . $placeholder .'">';
    }
    else if (!empty($name))
    {
      $input = '<input type="' . $type . '" name="' . $name . '"
        value="' . $value . '">';
    }
    else
    {
      $input = '<input type="' . $type . '" value="' . $value . '">';
    }

    return $input;
  }
}

?>
