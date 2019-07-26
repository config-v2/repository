<?php 
session_start();

$_SESSION['login']="";
$_SESSION['password']="";
$_SESSION['ip']='';

header("Location: ../");
?>