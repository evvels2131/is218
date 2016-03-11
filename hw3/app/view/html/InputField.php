<?php
namespace app\view\html;

class InputField extends HTML
{
  public static function newInputField($type, $name = '', $value = '',
    $readonly = '', $placeholder = '')
  {
    if ($type == 'file')
    {
      $input = '<input type="file" id="' . $name . '" placeholder="' . $placeholder . '">';
    }
    else if (!empty($type) && !empty($name) && !empty($value) && !empty($readonly))
    {
      // Used for the ID attribute
      $input = '<input type="' . $type . '" name="' . $name . '" class="form-control"
        value="' . $value . '" placeholder="ID" readonly>';
    }
    else if (!empty($type) && !empty($name) && !empty($value) && empty($placeholder))
    {
      // Used for make, model, and year [Edit Car Page]
      $input = '<input type="' . $type . '" class="form-control"
        value="' . $value . '" name="' . $name . '">';
    }
    else if (!empty($type) && !empty($name) && !empty($placeholder) && empty($value))
    {
      // AddCarPage.php
      $input = '<input type="' . $type . '" name="' . $name . '" class="form-control"
        placeholder="' . $placeholder . '">';
    }

    return $input;
  }
}

?>
