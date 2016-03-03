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
      method="' . $this->_method . '"><br />';
  }
}

?>
