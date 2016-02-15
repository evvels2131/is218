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

// Improved Menu class with id and class attributes
class MenuWithAttributes
{
  private $_id;
  private $_class;
  private $_menuHeader;

  public function __construct($id = "", $class = "")
  {
    $this->_id = $id;
    $this->_class = $class;
    $this->_menuHeader = '<ul id="' . $this->_id . '" class="' . $class . '">';
  }

  // Getters and setters
  public function getId()
  {
    return $this->_id;
  }

  public function setId($newId)
  {
    $this->$_id = $newId;
  }

  public function getClass()
  {
    return $this->_class;
  }

  public function setClass($newClass)
  {
    $this->$_class = $newClass;
  }
}
?>
