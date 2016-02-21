<?php
namespace app\html;

abstract class HTML
{
  public static function cleanAttribute($attribute)
  {
    $pos = strrpos($attribute, '_') + 1;
    $strlen = strlen($attribute) - 1;
    $cleanAttribute = substr($attribute, $pos, $strlen);
    $cleanAttribute = ucfirst($cleanAttribute);

    return $cleanAttribute;
  }

}

?>
