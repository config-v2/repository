<? 
session_start();
require_once('class/functions.class.php');
require_once('data/logins.php');
$scheme=Config::scheme();
$host_path=str_ireplace('index.php','', $_SERVER['PHP_SELF']);
$host=$_SERVER['HTTP_HOST'].$host_path; $server="{$scheme}://{$host}";
if (($_SESSION['login']==$login) AND ($_SESSION['password'])==$password) {
require_once('data/array.php'); $filename = "data/value.php";
if (file_exists($filename)) include ($filename);
include('pages/main.php');
 }  else include('pages/signin.php');