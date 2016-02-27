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
    $this->_formHeader = '<form action="' . $this->_action . '" method="' . $this->_method . '"><br />';
  }

  public function addNewInput($inputItem)
  {
    $this->_form[] = $inputItem;
  }

  public function getForm()
  {
    $formHTML = $this->_formHeader;
    foreach ($this->_form as $inputItem)
    {
      $formHTML .= '<div class="form-group">';
      $formHTML .= $inputItem;
      $formHTML .= '</div>';
    }
    $formHTML .= '</form>';

    return $formHTML;
  }
}

?>
