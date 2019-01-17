 <?php  require_once('../class/functions.class.php'); ?> 
<?php  $path="../logs/{$_POST['y']}/{$_POST['m']}/{$_POST['d']}.php";
$date="{$_POST['d']} ".config::month_rus((int)$_POST['m'],true)." {$_POST['y']}";
if (file_exists($path)) {
	if (unlink($path)) echo("Журнал заявок за <strong>{$date}</strong> успешно удален"); else echo("Ошибка удаления журнала заявок за <strong>{$date}</strong>");
} else echo ("Журнал заявок за <strong>{$date}</strong> не найден");