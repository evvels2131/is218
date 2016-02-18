<?php
namespace app\html;

include_once('autoloadFunction.php');

class Menu extends HTML
{
  private $_menu;

  public function addMenuItem($link)
  {
    $this->_menu[] = $link;
  }

  public function getMenu()
  {
    $menuHTML = '<ul>';
    foreach ($this->_menu as $menuItem)
    {
      $menuHTML .= '<li>' . $menuItem . '</li>';
    }
    $menuHTML .= '</ul>';

    return $menuHTML;
  }
}
?>
