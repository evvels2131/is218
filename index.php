<?php

echo '<a href="index.php?page=about">About</a><br />';
echo '<a href="index.php?page=contant">Contact</a><br />';
echo '<a href="index.php">Home</a><br />';

echo '<h4>print_r($_GET)</h4>';
echo '<pre>' .print_r($_GET). '</pre>';

echo '<h4>$_SERVER[\'REQUEST_METHOD\']</h4>';
echo $_SERVER['REQUEST_METHOD'];

?>