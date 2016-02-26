<?php
namespace app\view\html;

abstract class HTML
{
  public static function cleanAttribute($attribute)
  {
    $pos = strrpos($attribute, '_') + 1;
    $strlen = strlen($attribute) - 1;
    $cleanAttribute = ucfirst(substr($attribute, $pos, $strlen));

    return $cleanAttribute;
  }

  public static function cleanAttributeForm($attribute)
  {
    $pos = strrpos($attribute, '_') + 1;
    $strlen = strlen($attribute) - 1;
    $cleanAttribute = substr($attribute, $pos, $strlen);

    return $cleanAttribute;
  }
}

?>
