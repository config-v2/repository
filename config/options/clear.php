<? session_start();
$file="../data/value.php";
$config='<?'."\n".'session_start();'."\n".'require_once("config/class/functions.class.php");'."\n".'require_once("config/class/lands.class.php");'."\n".'require_once("config/data/define.php");'."\n";
if (md5($_POST['password'])==$_SESSION['password']) {
	if (file_exists($file)) {
		unlink($file);
		file_put_contents('../../config.php', $config);
		echo("Данне успешно удалены");
	} else echo ("Конфигуратор уже был обнулен ранее");
}