<?php

echo '<a href="index.php?page=about">About</a><br />';
echo '<a href="index.php?page=contact">Contact</a><br />';
echo '<a href="index.php">Home</a><br />';

echo '<br /><b>print_r($_GET)</b> --> ';
print_r($_GET);
echo '<br />';

echo '<br /><b>$_SERVER[\'REQUEST_METHOD\']</b>  --> ';
echo $_SERVER['REQUEST_METHOD'];
echo '<br />';

echo '<hr>';

if (isset($_GET['page'])) 
{
  $page = $_GET['page'];
}
else
{
  $page = homepage;
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
    echo '<h2>About</h2>';
    
    echo '<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra,<br />
    per inceptos himenaeos. Duis sit amet porttitor turpis. Pellentesque tincidunt<br />
    purus vel urna blandit, id dignissim libero dapibus. Donec in aliquet libero.<br /> Phasellus sapien erat, fringilla non augue id, imperdiet interdum dolor. Mauris<br />
    lorem ante, facilisis gravida lacinia laoreet, accumsan a tellus. Aliquam mollis<br />
    tempus sem, at malesuada sapien placerat a.</p>';
  
    echo '<h3>Try the <i>post()</i> method below:</h3>';
    echo '<form action="index.php?page=about" method="post">
          <p>Data: <input type="text" name="data" /></p>
          <p><input type="submit"></p>
          </form>';
  }
  
  public function post()
  {
    echo '<h2>About</h2>';
    
    echo '<h3><i>post()</i> method was triggered in <i>about</i> page</h3>';
    print_r($_POST);
  }
}

class homepage
{
  public function get()
  {
    echo '<h2>Homepage</h2>';
    
    echo '<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra,<br />
    per inceptos himenaeos. Duis sit amet porttitor turpis. Pellentesque tincidunt<br />
    purus vel urna blandit, id dignissim libero dapibus. Donec in aliquet libero.<br /> Phasellus sapien erat, fringilla non augue id, imperdiet interdum dolor. Mauris<br />
    lorem ante, facilisis gravida lacinia laoreet, accumsan a tellus. Aliquam mollis<br />
    tempus sem, at malesuada sapien placerat a.</p>';
    
    echo '<h3>Try the <i>post()</i> method below:</h3>';
    echo '<form action="index.php" method="post">
          <p>Data: <input type="text" name="data" /></p>
          <p><input type="submit"></p>
          </form>';
  }
  
  public function post()
  {
    echo '<h2>Homepage</h2>';
    
    echo '<h3><i>post()</i> method was triggered in <i>homepage</i></h3>';
    print_r($_POST);
  }
}

class contact
{
  public function get()
  {
    echo '<h2>Contact</h2>';
    
    // Form
    echo '<form action="index.php?page=contact" method="post">
          <p>Your name: <input type="text" name="fullname" /></p>
          <p>Your age:  <input type="text" name="age" /></p>
          <p><input type="submit" /></p>
          </form>';
  }
  
  public function post()
  {
    echo '<h2>Contact</h2>';
    
    echo '<h3>Thank you for submitting the form!</h3>';
    echo '<h4>Hers\'s what you submitted:</h4>';
    print_r($_POST);
  }
}
?>