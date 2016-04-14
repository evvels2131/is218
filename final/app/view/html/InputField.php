<?php
namespace app\view\html;

class InputField extends HTML
{
  public static function newInputField($type, $name, $placeholder = '',
    $value = '')
  {
    $input = '<input type="' . $type . '" name="' . $name . '"
      class="form-control" placeholder="' . $placeholder . '" >';

    return $input;
  }

  public static function hiddenInputField($type, $name)
  {
    $token = md5(uniqid(rand(), true));
    $_SESSION['token'] = $token;
    $input = '<input type="' . $type . '" name="' . $name . '" value="' . $token . '"
      class="hp" >';

    return $input;
  }
}


?>
