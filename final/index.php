<?php
session_start();

use app\App;

require_once('autoloadFunction.php');

$app = new App;

$_SESSION['username'] = 'tgoralczyk1';
//session_unset();

?>
