<?php 
session_start();
require_once('../class/functions.class.php');	$scheme = Config::scheme();
$host_path=str_ireplace('options/autoring.php','', $_SERVER['PHP_SELF']);
$host=$_SERVER['HTTP_HOST'].$host_path;
$server="{$scheme}://{$host}";
$_SESSION['login']=$_POST['login'];
$_SESSION['password']=md5($_POST['password']);
$_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
header("Location: ".$server);
?>