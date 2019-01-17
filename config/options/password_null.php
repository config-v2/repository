<?php 
session_start();
include ("data/logins.php");
require_once('data/array.php');

if ($_GET['id']==$code) {
	$_SESSION['login']="";
	$_SESSION['password']="";
//$fp = fopen('data/logins.php', 'w+');
//flock($fp, LOCK_EX); 
$fp = 'data/logins.php';
$file_conf="Null password for configuration ver.{$config['ver']} ";
$last_edit="Last edition by ".date('d.m.Y, H:i:s');
$ip="ip: {$_SERVER['REMOTE_ADDR']}";
$create="Created by {$_SESSION['SERVER_NAME']}";
$power1= $config['powered'];
$power2=$config['site_gg'];
$text="<?php \n/* ".str_repeat("* ", 22)."\n";
$text.=" * ".str_pad($file_conf, 41, " ", STR_PAD_BOTH)." *\n";
$text.=" * ".str_pad($_SERVER['SERVER_NAME'], 41, " ", STR_PAD_BOTH)." *\n";
$text.=" * ".str_pad($last_edit, 41, " ", STR_PAD_BOTH)." *\n";
$text.=" * ".str_pad($ip, 41, " ", STR_PAD_BOTH)." *\n";
$text.=" ".str_repeat("* ", 22)."*/\n\n";
$md5p=md5('admin');
$text.="$"."login='admin';\n$"."password='{$md5p}';\n";
$text.="\n/* ".str_repeat("* ", 22)."\n";
$text.=" * ".str_pad($create, 41, " ", STR_PAD_BOTH)." *\n";
$text.=" * ".str_pad($power1, 41, " ", STR_PAD_BOTH)." *\n";
$text.=" * ".str_pad($power2, 41, " ", STR_PAD_BOTH)." *\n";
$text.=" ".str_repeat("* ", 22)."*/\n\n";
$text.="?>\n";
if (file_exists('data/amn.php')) unlink('data/amn.php');
file_put_contents($fp, $text);
$pass='Пароль заменен успешно!';

}
else $pass='Ошибка восстановления!';



//header("Location: /config?pass={$pass}");
?>