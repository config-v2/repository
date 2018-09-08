<? session_start();
$file="../data/value.php";
$file_eml="../include/eml64.log";
$config='<?'."\n".'session_start();'."\n".'require_once("config/class/functions.class.php");'."\n".'require_once("config/class/lands.class.php");'."\n".'require_once("config/data/define.php");'."\n";
if (md5($_POST['password'])==$_SESSION['password']) {
	if (file_exists($file)) {
		unlink($file);
		if (file_exists($file_eml)) unlink($file_eml);
		file_put_contents('../../config.php', $config);
		echo("Данные успешно удалены");
	} else echo ("Конфигуратор уже был обнулен ранее");
}