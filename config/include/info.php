<?
include('config/logins.php');
$file_eml='config/include/eml64.log';

$eml = file_get_contents($file_eml);
//echo("{$eml} : ".base64_encode($email));
//echo("<br>{$password} : ".md5('admin'));

//if ($eml==base64_encode($email))  echo("<br>Да  eml<br>"); else echo("<br>НЕТ  eml<br>");
//if  ($password==md5('admin')) echo("<br>Да password<br>"); else  echo("<br>НЕТ password<br>");
if (($eml!=base64_encode($email)) OR ($password==md5('admin'))) {
	//echo ('Отправляю');
$sender = "Игорь Саютин <greygler@{$host}>";
$header="Content-type: text/html;charset=utf-8\r\nFrom: {$sender}\r\n";
$subj_conf="Конифгуратор для лендинга {$host}";
$mess_conf='<b>Приветствую.</b><br><br>На вашем лендинге <a target="_blank" href="'.$server.'">'.$server.'</a> установлен Конфигуратор - специальная админ-панель, позволяющяя настраивать цены, тригеры, отправки и пр. без знаний основ программирования.<br> Для входа в Конфигуратор, наберите <b>/config</b> после названия сайта или войдите по ссылке <a  target="_blank" href="'.$server.'/config">'.$server.'/config</a>.<br><br>Логин и пароль по умолчанию:<br>
<b>Логин:</b> admin</br><b>Пароль:</b> admin<br><br><center><font color="red"><b>Не забудьте поменять пароль!</b></font></center><br><br>Видеоинструкция по использованию конфигуратора - <a  target="_blank" href="https://youtu.be/I56D87MHQnI">https://youtu.be/I56D87MHQnI</a><br><br>Обратите внимание, что в этой версии Конфигуратора есть функция отправки заявок в Телеграм.<br>Инструкция по настройке – <a  target="_blank" href="https://youtu.be/yKIIW_428mo">https://youtu.be/yKIIW_428mo</a><br><br>С Уважением,<br>разработчик Конфигуратора<br><b>Игорь Саютин</b> a.k.a. <b>GreyGler</b><br>';
$ver_conf = mail($email,$subj_conf,$mess_conf,$header);
if ($ver_conf == 'true'){ 
file_put_contents($file_eml, base64_encode($email));
}
} ?>