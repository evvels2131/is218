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
    $this->_formHeader = '<form action="' . $this->_action . '" method="' . $this->_method . '"
      enctype="multipart/form-data"><br />';
  }

  public function addNewInput($inputItem)
  {
    $this->_form[] = $inputItem;
  }

  public function getForm()
  {
    $formHTML = $this->_formHeader;

    $inputs = HTML::getValuesFromArray($this->_form, 'input');
    $buttons = HTML::getValuesFromArray($this->_form, 'button');

    // Generate all input fields
    foreach ($inputs as $inputItem)
    {
      $label = HTML::getLabels($inputItem);

      $formHTML .= '<div class="form-group">';
      $formHTML .= '<label>' . $label . '</label>';
      $formHTML .= $inputItem;
      $formHTML .= '</div>';
    }

    // Generate all buttons
    $formHTML .= '<div class="form-group">';
    $formHTML .= '<div class="btn-group">';
    foreach ($buttons as $inputItem)
    {
      $formHTML .= $inputItem;
    }
    $formHTML .= '</div></div>';

    $formHTML .= '</form>';

    return $formHTML;
  }
}

?>
