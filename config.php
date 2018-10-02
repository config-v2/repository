<?php
/* * * * * * * * * * * * * * * * * * * * * * * 
 *   Configuration v.2.2 for LandingPage:    *
 *           Created for config_v2           *
 *   Last edition by 02.10.2018, 15:56:27    *
 * * * * * * * * * * * * * * * * * * * * * * */

session_start();
require_once("config/class/functions.class.php");
require_once("config/class/lands.class.php");
require_once("config/data/define.php");
$product = "Демонстрация возможностей Конфигуратора v.2.1";
$og_tag = "0";
$valuta = "грн";
$price_new = "256";
$price_old_select = "0";
$price_old = "625";
$country_script = "auto";
$mask_phone = "-";
$head_index64 = "";
$head_thanks64 = "";
$body_index64 = "";
$body_thanks64 = "";
$mail_type = "";
$email = "admin@{$domen}";
$sender = "Уведомление <noreply@{$domen}>";
$subject = "Заказ товара - {$product}";
$message = "<table border='0'>
<tbody>
<tr>
<td colspan='2' height='40'>
<p align='center'><em>Информация о покупателе:</em></p>
</td>
</tr>
<tr>
<td><strong>IP покупателя:</strong></td>
<td>{$remote_addr}</td>
</tr>
<tr>
<td><strong>Имя Internet-хоста:</strong></td>
<td>{$remote_host}</td>
</tr>
<tr>
<td><strong>Использование прокси:</strong></td>
<td>{$proxy}</td>
</tr>
<tr>
<td><strong>Страна (по IP):</strong></td>
<td>{$country_code}</td>
</tr>
<tr>
<td><strong>Город (по IP):</strong></td>
<td>{$city}</td>
</tr>
<tr>
<td><strong>Установленный язык:</strong></td>
<td>{$lang}</td>
</tr>
<tr>
<td><strong>Браузер: </strong></td>
<td>{$browser}</td>
</tr>
<tr>
<td><strong>Устройство:</strong></td>
<td>{$device}</td>
</tr>
<tr>
<td><strong>ОС:</strong></td>
<td>{$os}</td>
</tr>
<tr>
<td><strong>Время на ленде:</strong></td>
<td>{$time_in_land}</td>
</tr>
<tr>
<td><strong>Кол-во визитов:</strong></td>
<td>{$visit}</td>
</tr>
<tr>
<td valign='top'><strong>Последний визит:</strong></td>
<td>{$visit_text}</td>
</tr>
<tr>
<td><strong>Разрешение экрана:</strong></td>
<td>{$screen}</td>
</tr>
<tr>
<td><strong>Заряд батареи:</strong></td>
<td>{$batery_proc}</td>
</tr>
<tr>
<td><strong>Зарядное устройство:</strong></td>
<td>{$batery_zar}</td>
</tr>
<tr>
<td><strong>Реферер:</strong></td>
<td><a href='{$_SESSION['referer']}' target='_blank' rel='noopener'>{$_SESSION['referer']}</a></td>
</tr>
<tr>
<td colspan='2'>
<p align='center'><strong>UTM-метки: </strong></p>
{$utm}</td>
</tr>
<tr>
<td><strong>Комментарий к заказу: </strong></td>
<td>
<p>{$comment}</p>
</td>
</tr>
</tbody>
</table>";
$comment = "";
$tele_id = "";
$seller = "";
$seller_adress = "";
$contact_phone1 = "";
$contact_phone2 = "";
$contact_phone3 = "";
$contact_email = "";
$script_pokup = "0";
$script = "0";
$modal = "0";
$thanks1 = "Поздравляем!<br>Ваш заказ принят!";
$thanks2 = "В ближайшее время с вами свяжется оператор для подтверждения заказа";
$thanks3 = "Если вы ошиблись при заполнении формы, то, пожалуйста,<br>%back_link% заполните заявку еще раз";
$upsel = "0";
$ip_block = "";
$crm = "";
$skidka = 100-floor(($price_new/$price_old)*100);
$currency=$valuta; $discount=$skidka;
if (config::is_ip($remote_addr,$ip_block)==true) {include("config/blockip/index.php"); exit();}

/* * * * * * * * * * * * * * * * * * * * * * * 
 *           Created for config_v2           *
 *            Powered by GreyGler            *
 *        https://greygler.github.io         *
 * * * * * * * * * * * * * * * * * * * * * * */


?>
