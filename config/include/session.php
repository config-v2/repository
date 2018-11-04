<?
foreach($_GET as $key => $value) $_SESSION['utms'][$key] = $value;
foreach($_SERVER as $key => $value) $_SESSION['server'][$key] = $value;
?>