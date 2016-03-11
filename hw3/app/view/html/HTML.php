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

  // Return an array that contains only the specified values
  public static function getValuesFromArray($array, $search)
  {
    $matches = array();

    foreach ($array as $key => $value)
    {
      if (preg_match("/\b$search\b/i", $value))
      {
        $matches[$key] = $value;
      }
    }

    return $matches;
  }

  // Return input labels
  public static function getLabels($inputItem)
  {
    $last = strrpos($inputItem, '"');
    $secondLast = strrpos($inputItem, '"', $last - strlen($inputItem) - 1) + 1;
    $result = substr($inputItem, $secondLast, $last - $secondLast);

    return ucfirst($result);
  }
}
?>
