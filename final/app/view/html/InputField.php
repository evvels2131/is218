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

  public static function newInputFieldEdit($type, $name, $placeholder = '',
    $value = '', $disabled)
  {
    if ($disabled) {
      $input = '<input type="' . $type . '" name="' . $name . '"
        class="form-control disabled" value="' . $value . '" placeholder="' . $placeholder . '" >';
    } else {
      $input = '<input type="' . $type . '" name="' . $name . '"
        class="form-control" value="' . $value . '" placeholder="' . $placeholder . '" >';
    }
    return $input;
  }

  public static function hiddenImageField($img_url) 
  {
    return '<input type="text" name="img_url" value="' . $img_url . '" class="hp" />';
  }
}


?>
