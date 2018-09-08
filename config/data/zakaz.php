<? include('config.php'); 
require_once("config/class/smtp_mail.class.php");
$name = stripslashes(htmlspecialchars($_POST['name']));
$phone = stripslashes(htmlspecialchars($_POST['phone']));
$email_client = $_POST['email'];
$_SESSION['name']=$name;
$_SESSION['phone']=$phone;
$_SESSION['email']=$email_client;

if(empty($phone)) { echo('<meta http-equiv="refresh" content="2; url=http://'.$_SERVER['SERVER_NAME'].'">');
echo('<h1 style="color:red;">Пожалуйста заполните все поля</h1>'); }
else{
	$mess_tele=""; // Комментарий в telegram
	if ($key_crm!="")		include('config/include/key_crm.php');
	if ($tele_id!="") 		include('config/include/tele_id.php');
	if ($tele_id!="") 		include('config/include/info.php');
	if ($user_api_key!="")	include('config/include/api_key.php');
		
	$success_url = 'form-ok.php';
	$message1 = "<table border=\"0\">
	<tr><td colspan=\"2\" ><b>Товар:</b><font size=\"5\" color=\"#FF0000\"> {$product}</font></td></tr><tr><td><b>Цена:&nbsp; </b></td><td >{$price_new} {$valuta}</td></tr><tr><td><b>Старая цена:&nbsp; </b></td><td >{$price_old} {$valuta}</td></tr>
	<tr><td><b>Скидка:&nbsp; </b></td><td >{$skidka} %</td></tr><tr><td ><b>Покупатель:</b></td><td>{$name}</td></tr><tr><td ><b>Телефон: </b></td><td>{$phone}</td></tr><tr><td ><b>Сайт продажи:</b></td><td><a href='{$server}' target='_blank'>{$server}</a></td></tr><tr><td ><b>Дата заказа: </b></td><td>{$date}</td></tr><tr><td ><b>Время заказа: </b></td><td>{$time}</td></tr></table>";
	$message = $message1.$message."{$mess}";
	



file_put_contents('log.txt', $message);

	  if ($mail_type!=1) $verify = mail($email,$subject,$message,$header);
	 else $verify = smtp_mail::sendmail($smtp, $smtp_user, $smtp_pass, $mail_secure, $smtp_port, $product, $email, $subject, $message );
	/* if ($verify == 'true'){
		 header('Location: '.$success_url);
		echo '<h1 style="color:green;">Поздравляем! Ваш заказ принят!</h1>';
		exit;
	}
	else 
    {
    echo '<h1 style="color:red;">Произошла ошибка отправки заказа на E-mail!<br>'.$verify.'</h1>';
    }
} */
?>
</body>
</html>
