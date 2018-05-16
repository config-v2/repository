<?php
$time_land='3';
$remote_addr=Config::GetRealIp();
$is_proxy=Config::isProxy($_SERVER);
$proxy=Config::proxy($is_proxy);
if (isset($_SERVER['HTTPS'])) $scheme = $_SERVER['HTTPS']; else $scheme = '';
$cookie_days = 30; // Период cookie в днях
$period_cookie = $cookie_days*24*60*60; // Пересчет в секунды

$date=Config::date_rus();
$time=date('H:i:s');
$lang=$_SERVER['HTTP_ACCEPT_LANGUAGE'];
$screen=$_POST['screen']['width']." х ".$_POST['screen']['height'];
if ($_POST['battery']['proc']>0) $batery_proc=(($_POST['battery']['proc'])*100).'%'; else $batery_proc="Не определено";

if ($_POST['battery']['zar']=='true') $batery_zar="Подключено"; else $batery_zar="Не подключено, или не определено";

if ($_POST['time_lend']<60) $time_in_land=$_POST['time_lend']." сек.";
else if (($_POST['time_lend']>60) AND ($_POST['time_lend']<3600)) $time_in_land=date("i мин. s сек.", mktime(0, 0, $_POST['time_lend']));
else $time_in_land=date("H час. i мин. s сек.", mktime(0, 0, $_POST['time_lend']));

if ($remote_addr=="127.0.0.1") $remote_addr="localhost";
if (stripos($_SERVER['PHP_SELF'], "index"))
	{
		 $visit=$_COOKIE['visit'];
		$visit++;
		SetCookie("visit",$visit,time()+$period_cookie);
		SetCookie("time[{$visit}]",time(),time()+$period_cookie);
		SetCookie("ip[{$visit}]",$remote_addr,time()+$period_cookie); 
		if (($scheme) && ($scheme != 'off')) $scheme = 'https'; else $scheme = 'http';
		
		$host_path=str_ireplace('index.php','', $_SERVER['PHP_SELF']);
		$host=$_SERVER['HTTP_HOST'].$host_path;
		$_SESSION['host']=$host;
		$server="{$scheme}://{$host}";
		$host=$_SESSION['host'];
		$_SESSION['server']=$server;
		$server_request_uri="{$scheme}://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
		$_SESSION['server_request_uri']=$server_request_uri;
		require_once("config/session.php");
		if ($_SERVER['HTTP_REFERER']!="") $_SESSION['referer']=$_SERVER['HTTP_REFERER'];
		else $_SESSION['referer']="Не определен.";
		$geo = Config::info_geo($remote_addr);
		$_SESSION['country_code'] = $geo['iso'];
		$_SESSION['country'] = $geo['country'];
		$_SESSION['city']=$geo['city'].", ".$geo['region'].", ".$geo['country'];
		$_SESSION['geocity']=$geo['city'];
		$country_code = $_SESSION['country_code'];
		$country = $_SESSION['country'];
		$city=$_SESSION['city'];
		$geocity=$_SESSION['geocity'];
		SetCookie("geo[{$visit}]",$_SESSION['city'],time()+$period_cookie);
		}
else {
	$visit=$_COOKIE['visit'];
	$time_cookie=$_COOKIE['time'];
	$ip_cookie=$_COOKIE['ip'];
	$geo_cookie=$_COOKIE['geo'];
	if (isset($_SESSION['utms'])) foreach ($_SESSION['utms'] as $key => $value) $utm.="<tr><td><b>".str_pad($key, 14, " ", STR_PAD_RIGHT)."</b> </td><td> {$value}</td></tr>\n";
	if ($visit>1) {
		for($i=1; $i<$visit; $i++) $visit_text.="{$i}. | <i>".date("d.m.Y H:i:s",$time_cookie[$i])."</i> | ip: {$ip_cookie[$i]}</u> ({$geo_cookie[$i]})<br>";
	} else $visit_text="Прошлых визитов за последние {$cookie_days} дней не обнаружено";
	$country_code = $_SESSION['country_code'];
	$city=$_SESSION['city'];
	$geocity=$_SESSION['geocity'];
	$country = $_SESSION['country'];
	$server=$_SESSION['server'];
	$host=$_SESSION['host'];
	$server_request_uri=$_SESSION['server_request_uri'];
}
$device=Config::device_name(Config::is_mobile());
$user_agent=$_SERVER['HTTP_USER_AGENT'];
$browser=Config::user_browser($user_agent);
$os=Config::getOS($user_agent);