<?php
namespace app\view\html;

class CaptchaHTML extends HTML
{
  public static function getCaptcha()
  {
    $captchaHTML = '<div class="form-group">';
    $captchaHTML .= '<img src="app/view/html/Captcha.php" alt="CAPTCHA"
      id="captcha" style="width:130px; display:block;">';
    $captchaHTML .= '<small class="text-muted">Insert the captcha digits into the input field.</small>';
    $captchaHTML .= '</div>';

    return $captchaHTML;
  }
}

?>
