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

// Input field class
class Input
{
  public static function newInput($type, $name, $value)
  {
    $input = '<input type="' . $type . '" name="' . $name . '" value="' . $value .'">';
    return $input;
  }
}

$inputField = Input::newInput('text', 'fname', 'First Name');
echo $inputField;

// Form class
class Form
{
  private $_action;
  private $_method;
  private $_formHeader;
  private $_form;

  public function __construct($action, $method)
  {
    $this->_action = $action;
    $this->_method = $method;
    $this->_formHeader = '<form action="' . $this->_action . '" method="' . $this->_method . '">';
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
      $formHTML .= $inputItem . '<br />';
    }
    $formHTML .= '</form>';

    return $formHTML;
  }
}

$inputField2 = Input::newInput('text', 'lname', 'Last Name');
$inputField3 = Input::newInput('password', 'pass', 'Password');

$form = new Form('index4.php', 'POST');
$form->addNewInput($inputField);
$form->addNewInput($inputField2);
$form->addNewInput($inputField3);

echo $form->getForm();

// Table Class

// Improved Menu class with id and class attributes
class MenuWithAttributes
{
  private $_id;
  private $_class;
  private $_menu;
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

  public function addMenuItem($newLink)
  {
    $this->_menu[] = $newLink;
  }

  public function getMenu()
  {
    $menuHTML = $this->_menuHeader;
    foreach ($this->_menu as $menuItem)
    {
      $menuHTML .= '<li>' . $menuItem . '</li>';
    }
    $menuHTML .= '</ul>';

    return $menuHTML;
  }
}

$menu2 = new MenuWithAttributes('idtest', 'classtest');
$menu2->addMenuItem($link);
$menu2->addMenuItem($link2);
$menu2->addMenuItem($link3);

$html2 = $menu2->getMenu();
echo $html2;
?>
