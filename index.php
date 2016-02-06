<?php

echo '<a href="index.php?page=about">About</a><br />';
echo '<a href="index.php?page=contact">Contact</a><br />';
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

class about 
{
  public function get()
  {
    echo '<br />this is the "about" page';
  }
}

class homepage
{
  public function get()
  {
    echo '<br />this is the "homepage"';
  }
}

class contact
{
  public function get()
  {
    echo '<br />this is the "contact" page';
  }
}
?>