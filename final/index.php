<?php
//session_start();

use app\App;
use app\model\Database;
use app\model\Model;

require_once('autoloadFunction.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//print_r($_SESSION);
$app = new App;

//$_SESSION['username'] = 'tgoralczyk1';
//session_unset();

/*
$db = new Database;
$db->register('Jimmy', 'jimmy@gmail.com', '102kgku22');
$db->register('Brian', 'brian@gmail.com', '213sgku22');

$mdb = new Model;
$mdb->registerNewUser('Marcin', 'marcing@gmail.com', '102103');
echo '<pre>';
print_r($db->getUsers());
echo '</pre>';
//$db->register('Steve', 'steve@gmail.com', '1291931');
//print_r($db->getUsers());





?>
