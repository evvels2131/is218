<?php
namespace app\view\html;

class InputField extends HTML
{
  public static function newInputField($type, $name, $placeholder = '',
    $value = '')
  {
    if ($type == 'text' || $type == 'password')
    {
      $input = '<input type="' . $type . '" name="' . $name . '"
        placeholder="' . $placeholder . '">';
    }
    else
    {
      $input = '<button type="' . $type . '" name="' . $name . '"
        class="btn btn-primary">' . $value . '</button>';
    }

    return $input;
  }
}


?>
