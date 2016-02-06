<?php

echo '<a href="index.php?page=about">About</a><br />';
echo '<a href="index.php?page=contant">Contact</a><br />';
echo '<a href="index.php">Home</a><br />';

echo '<h4>print_r($_GET)</h4>';
print_r($_GET);

echo '<h4>$_SERVER[\'REQUEST_METHOD\']</h4>';
echo $_SERVER['REQUEST_METHOD'];

if (isset($_GET['page'])) 
{
  $page = $_GET['page'];
}
//echo $page;
$obj = new $page;

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
  $obj->get();
}
else
{
  $obj->post();
}

?>