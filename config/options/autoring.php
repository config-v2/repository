<?
session_start();
if (isset($_SERVER['HTTPS'])) $scheme = $_SERVER['HTTPS']; else $scheme = '';
if (($scheme) && ($scheme != 'off')) $scheme = 'https'; else $scheme = 'http';
$host_path=str_ireplace('options/autoring.php','', $_SERVER['PHP_SELF']);
$host=$_SERVER['HTTP_HOST'].$host_path;
$server="{$scheme}://{$host}";
$_SESSION['login']=$_POST['login'];
$_SESSION['password']=md5($_POST['password']);

//print_r($_SESSION);
//print_r($_POST);
header("Location: ".$server);
?>