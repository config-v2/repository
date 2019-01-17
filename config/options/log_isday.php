<?php 
//print_r($_POST);
$logpath='../logs/'.$_POST['f'];
if (file_exists($logpath))  {require_once($logpath); echo htmlspecialchars_decode($log);}
else echo('<tr><td colspan="5" ><h3>Журнал заявок не найден.</h3></td></td>')
?>
 