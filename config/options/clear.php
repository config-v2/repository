<?php  session_start();
$file="../data/value.php";
$file_eml="../include/eml64.log";
$config='<?php '."\n".'session_start();'."\n//ip: {$_SERVER['REMOTE_ADDR']}\n".'require_once("config/class/browser.class.php");'."\n".'require_once("config/class/functions.class.php");'."\n".'require_once("config/class/lands.class.php");'."\n".'require_once("config/data/define.php");'."\n".''."\n";
/* $host_path=str_ireplace('config/options/clear.php','', $_SERVER['PHP_SELF']);
		$domen=str_ireplace("www.", "", $_SERVER['HTTP_HOST']);
		$host=$domen.$host_path;
$favicon='//www.google.com/s2/favicons?domain='.$host;
echo $favicon;
 $vowels = array("http", "https",".",":","/");
$nameimg = "temp/".str_replace($vowels, "", $host).".fav";
 $file = file_get_contents($favicon);
  file_put_contents('../images/'.$nameimg, $file); */
if (md5($_POST['password'])==$_SESSION['password']) {
	if (file_exists($file)) {
		unlink($file);
		if (file_exists($file_eml)) unlink($file_eml);
		file_put_contents('../../config.php', $config);
		echo("Данные успешно удалены");
	} else echo ("Конфигуратор уже был обнулен ранее");
}