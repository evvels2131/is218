<?php

// Show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/////////////////////

// Link Class
class Link
{
  public static function newLink($title, $href, $target)
  {
    $link = '<a href="' . $href . '" target ="' . $target . '">' . $title . '</a>';
    return $link;
  }
}

$link = Link::newLink('Google', 'http://www.google.com', '_BLANK');
echo $link;

// Menu Class
class Menu
{
  private $_menu;

  public function addMenuItem($newLink)
  {
    $this->_menu[] = $newLink;
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

$link2 = Link::newLink('NJIT', 'http://njit.edu', '_BLANK');
$link3 = Link::newLink('CNN', 'http://cnn.com', '_BLANK');

$menu = new Menu();
$menu->addMenuItem($link);
$menu->addMenuItem($link2);
$menu->addMenuItem($link3);

$html = $menu->getMenu();
echo $html;
?>
