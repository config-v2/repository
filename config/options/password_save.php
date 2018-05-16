<?
session_start();
include ("../data/logins.php");
require_once('../data/array.php');
if (md5($_POST['pass_old'])==$_SESSION['password']) {
	$_SESSION['login']="";
	$_SESSION['password']="";
$fp = fopen('../data/logins.php', 'w+');
flock($fp, LOCK_EX); 
$file_conf="Password for configuration ver.{$config['ver']} ";
$last_edit="Last edition by ".date('d.m.Y, H:i:s');
$create="Created by {$_SESSION['SERVER_NAME']}";
$power1= $config['powered'];
$power2=$config['site_gg'];
$text="<?\n/* ".str_repeat("* ", 22)."\n";
$text.=" * ".str_pad($file_conf, 41, " ", STR_PAD_BOTH)." *\n";
$text.=" * ".str_pad($_SERVER['SERVER_NAME'], 41, " ", STR_PAD_BOTH)." *\n";
$text.=" * ".str_pad($last_edit, 41, " ", STR_PAD_BOTH)." *\n";
$text.=" ".str_repeat("* ", 22)."*/\n\n";

foreach($_POST as $key => $value) {
	if ($key=="password") $value=md5($value);
	$s="$".$key." = "."'{$value}';\n";
	if ($key!="pass_old")$text.=$s;
	
}
$text.="\n/* ".str_repeat("* ", 22)."\n";
$text.=" * ".str_pad($create, 41, " ", STR_PAD_BOTH)." *\n";
$text.=" * ".str_pad($power1, 41, " ", STR_PAD_BOTH)." *\n";
$text.=" * ".str_pad($power2, 41, " ", STR_PAD_BOTH)." *\n";
$text.=" ".str_repeat("* ", 22)."*/\n\n";
$text.="?>\n";
fwrite($fp, $text);
flock($fp, LOCK_UN); 

fclose($fp);
$pass='Пароль заменен успешно!';

}
else $pass='Не верный действующий пароль';


echo $pass;
//header("Location: /config?pass={$pass}");
?>