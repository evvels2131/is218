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

  // Hidden input field with unique key generated and stored in the session
  public static function hiddenInputField($type, $name)
  {
    $token = md5(uniqid(rand(), true));
    $_SESSION['token'] = $token;
    $input = '<input type="' . $type . '" name="' . $name . '" value="' . $token . '"
      class="hp" >';

    return $input;
  }

  // Honey pot input field
  public static function hpInputField()
  {
    $hpInputField = '<input type="text" name="hpt" class="hp" />';

    return $hpInputField;
  }

  // Captcha input field
  public static function captchaInputField()
  {
    $captchaInputField = '<input type="text" name="captcha" size="6" maxlength="5"
      class="form-control" value="" placeholder="Captcha">';

    return $captchaInputField;
  }
}


?>
