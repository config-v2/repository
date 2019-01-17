<?php 
include('config/data/logins.php');
$file_eml='config/include/eml64.log';
if (file_exists($file_eml)) $eml = file_get_contents($file_eml); else $eml="";
if (($eml!=base64_encode($email)) OR ($password==md5('admin'))) {
$sender = "Игорь Саютин <greygler@{$domen}>";
$header="Content-type: text/html;charset=utf-8\r\nFrom: {$sender}\r\n";
$subj_conf="Конифгуратор для лендинга {$host}";
$mess_conf='<b>Приветствую.</b><br><br>На вашем лендинге <a target="_blank" href="'.$server.'">'.$server.'</a> установлен Конфигуратор - специальная админ-панель, позволяющяя настраивать цены, тригеры, отправки информации о лидах и множество других параметров <b>без знаний основ программирования</b>.<br> Для входа в Конфигуратор, наберите <b>/config</b> после названия сайта или войдите по ссылке <a  target="_blank" href="'.$server.'config">'.$server.'config</a>.<br><br>Логин и пароль по умолчанию:<br><ul><li><b>Логин:</b> admin</li><li><b>Пароль:</b> admin</li></ul><br><center><font color="red"><b>ПЕРЕД НАЧАЛОМ ЗАПУСКА ВАШЕГО ОДНОСТРАНИЧНИКА В РАБОТУ<br>НЕ ЗАБУДЬТЕ ПОМЕНЯТЬ ПАРОЛЬ!</b></font></center><br><br>Подробную видеоинструкцию по настройке Вы сможете посмотреть  в разделе Конфигуратора "Помощь",<br> или по прямой ссылке здесь: <a  target="_blank" href="'.$insrtion.'">'.$insrtion.'</a><br><br>Кроме того Конфигуратор позволяет быстро, и опять таки без знания программирования подключить ваш одностраничник к некоторым СРМ системам.<br>Инструкции по подключению также содержаться в разделе "Помощь" или их можно посмотреть здесь:<br><ol>';
foreach ($ins_crm as $key => $value) $mess_conf.="<li><b>{$key}</b> : <a  target=\"_blank\" href=\"{$value}\">{$value}</a></li>";
$mess_conf.='</ol><br><hr align="left" width="30%"><br>С Уважением,<br>разработчик Конфигуратора<br><b>Игорь Саютин</b> a.k.a. <b>GreyGler</b><br>';
$ver_conf = mail($email,$subj_conf,$mess_conf,$header);
if ($ver_conf == 'true'){ 
file_put_contents($file_eml, base64_encode($email));
}
} ?>