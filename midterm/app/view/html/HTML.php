<?php
namespace app\view\html;

abstract class HTML
{
  public static function cleanAttribute($attribute, $capital = '')
  {
    $pos = strrpos($attribute, '_') + 1;
    $strlen = strlen($attribute) - 1;

    if (empty($capital))
    {
      $cleanAttribute = ucfirst(substr($attribute, $pos, $strlen));
    }
    else
    {
      $cleanAttribute = substr($attribute, $pos, $strlen);
    }

    return $cleanAttribute;
  }
}
?>
