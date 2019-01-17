<?php  require_once('../data/value.php'); require_once('../data/array.php'); $aemail = str_replace("%domen%", $_SERVER['SERVER_NAME'], $email); 
if (base64_decode($_POST['msg'])==$aemail) {
	include('save_amn.php');
	$subject="Востановление пароля";
	$message="Кто-то, а возможно и Вы дали заявку на восстановление пароля в <strong>{$config['name']} v.{$config['ver']}</strong> для <a href=\"//{$_SERVER['SERVER_NAME']}\">{$_SERVER['SERVER_NAME']}</a><br>Для сброса пароля перейдите по ссылке  {$link_amn}<br>Если ссылка не кликается - скопируйте и вставьте в браузер<br>После этого, вы сможете зайти в <strong>{$config['name']} v.{$config['ver']}</strong> со стартовыми логином и паролем.<br>Логин: <strong>admin</strong><br>Пароль: <strong>admin</strong><br><hr><br>\n<small> {$config['email']['footer']} <strong>{$config['name']} v.{$config['ver']}</strong>.<br>Подробнее: <a target='_blank' href='{$config['site_conf']}'>{$config['site_conf']}</a>, &copy; 2015-".date("Y").", <a target='_blank' href='{$config['site_gg']}'>{$config['powered']}</a></small>";;

 if ($mail_type==1) require_once("../class/libmail.class.php");
  if ($mail_type!=1) $verify = mail($aemail,$subject,$message,$header);
	 else {
		   if ($smtp_prot!="") $smtp="ssl://{$smtp}";
		//	echo "Sender: {$sender_smtp};<br> server: {$smtp}<br>email:{$email}<br>smtp_log:{$smtp_log}<br>smtp_pass:{$smtp_pass}<br> port:{$port}<br>subject:{$subject}<br>message:{$message}";
			$m= new Mail('UTF-8');  // можно сразу указать кодировку, можно ничего не указывать ($m= new Mail;)
			$m->From( $sender_smtp ); // от кого Можно использовать имя, отделяется точкой с запятой
			$m->To( $aemail );   // кому, в этом поле так же разрешено указывать имя
			$m->Subject( $subject );
			$m->Body($message, "html");
			$m->Priority(3) ;	// установка приоритета
			$m->smtp_on($smtp, $smtp_log, $smtp_pass, $port); // используя эту команду отправка пойдет через smtp
			//$m->log_on(true); // включаем лог, чтобы посмотреть служебную информацию
			$m->Send();	// отправка
		//	echo "Письмо отправлено, вот исходный текст письма:<br><pre>", $m->Get(), "</pre>";
			$verify =true;
	 }
}
?>  Инструкция по сбросу пароля отправлена на E-mail: <strong><?php echo  $aemail ?></strong><br>Если письма нет в течении 5 минут - проверьте папку "СПАМ"
