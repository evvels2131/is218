<?php
namespace app\view\html;

class InputField extends HTML
{
  public static function newInputField($type, $name = '', $value,
    $readonly = '', $placeholder = '')
  {
    if ($type == 'text')
    {
      if (!empty($readonly))
      {
        $input = '<input type="' . $type . '" name="' . $name . '"
          class="form-control" value="' . $value . '" placeholder="ID" readonly >';
      }
      else if (!empty($placeholder))
      {
        $input = '<input type="' . $type . '" name="' . $name . '"
          class="form-control" placeholder="' . $placeholder .'">';
      }
      else if (!empty($name))
      {
        $input = '<input type="' . $type . '" name="' . $name . '"
          class="form-control" value="' . $value . '" >';
      }
      else
      {
        $input = '<input type="' . $type . '" class="form-control">
          value="' . $value . '"';
      }
    }
    else
    {
      if (!empty($name))
      {
        $input = '<button type="' . $type . '" name="' . $name . '"
          value="' . $value . '" class="btn btn-primary">' . $value . '</button>';
      }
      else
      {
        $input = '<button type="' . $type . '" value="' . $value . '"
          class="btn btn-primary">' . $value . '</button>';
      }
    }

    return $input;
  }
}

?>
