<?php
include_once('autoloadFunction.php');

// InputField Class
class InputField
{
  public static function newInputField($type, $name = "", $value)
  {
    if (empty($name))
    {
      $input = '<input type="' . $type . '" value="' . $value .  '"><br />';
    }
    else {
      $input = '<input type="' . $type . '" name="' . $name . '" placeholder="' . $value .  '"><br />';
    }

    return $input;
  }
}

?>
