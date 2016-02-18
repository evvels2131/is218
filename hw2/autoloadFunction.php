<?php
function my_autoloader($class)
{
  $ds = DIRECTORY_SEPARATOR;
  $dir = __DIR__;

  $class = str_replace('\\', $ds, $class);

  $file = "{$dir}{$ds}{$class}.php";

  if (is_readable($file)) require_once $file;
}

spl_autoload_register('my_autoloader');

/*
function my_autoloader($class)
{
  include $class . '.php';
}*/
?>
