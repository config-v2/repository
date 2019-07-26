<?php  
session_start();
if ($_GET['id']!="") {
 if (file_exists('data/amn.php')) include('data/amn.php');
  if ($code==$_GET['id']) {
	  	
		include('options/password_null.php');
		$rec=$pass;
  }
else {
	$rec='Неверный код восстановления';
}
 
} else {
	$rec='<a data-toggle="modal" data-target="#amnesia" href=""><small>Забыли пароль?</small></a>';
}
	
	
	require_once('class/functions.class.php');
require_once('data/logins.php');
$scheme=Config::scheme();
$host_path=str_ireplace('index.php','', $_SERVER['PHP_SELF']);
$host=$_SERVER['HTTP_HOST'].$host_path; $server="{$scheme}://{$host}";
require_once('data/array.php');
if (($_SESSION['login']==$login) AND ($_SESSION['password']==$password)  AND ($_SESSION['ip']==$_SERVER['REMOTE_ADDR'])){
 $filename = "data/value.php";
if (file_exists($filename)) include ($filename);
include('pages/main.php');
 }  else include('pages/signin.php');
	
	
	
