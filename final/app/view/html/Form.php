<?php
namespace app\view\html;

class Form extends HTML
{
  private $_action;
  private $_method;
  private $_formHeader;
  private $_form;

  public function __construct($action, $method)
  {
    $this->_action = $action;
    $this->_method = $method;
    $this->_formHeader = '<form action="' . $this->_action . '"
      method="' . $this->_method . '" class="form-horizontal"
      enctype="multipart/form-data"><br />';
  }

  public function addNewInput($inputItem)
  {
    $this->_form[] = $inputItem;
  }

  public function getForm()
  {
    $formHTML = $this->_formHeader;

    // Grab only input values
    $search = 'input';
    $matches = array();

    foreach ($this->_form as $key => $value)
    {
      if (preg_match("/\b$search\b/i", $value))
      {
        $matches[$key] = $value;
      }
    }

    // Generate input values
    foreach ($matches as $inputItem)
    {
      // Grab the label for the input field
      $last = strrpos($inputItem, '"');
      $secondLast = strrpos($inputItem, '"', $last - strlen($inputItem) - 1) + 1;
      $result = substr($inputItem, $secondLast, $last - $secondLast);

      if ($result == 'hp') {
        continue;
      } else {
        $formHTML .= '<div class="form-group">';
        $formHTML .= '<label>' . $result . '</label>';
        $formHTML .= $inputItem;
        $formHTML .= '</div>';
      }
    }

    $formHTML .= '<div class="form-group">';
    $formHTML .= '<div class="btn-group">';
    foreach ($this->_form as $inputItem)
    {
      if (strpos($inputItem, 'btn') !== false)
      {
        $formHTML .= $inputItem;
      }
    }
    $formHTML .= '</div>';
    $formHTML .= '</div>';
    $formHTML .= '</form>';

    return $formHTML;
  }
}

?>
