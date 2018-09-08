<?php
$time_land='3';
$remote_addr=Config::GetRealIp();
$proxy=Config::isProxy($remote_addr);
$scheme=Config::scheme();
$remote_host=@gethostbyaddr($remote_addr);
$cookie_days = 30; // Период cookie в днях
$period_cookie = $cookie_days*24*60*60; // Пересчет в секунды
$date=Config::date_rus();
$time=date('H:i:s');
$lang=$_SERVER['HTTP_ACCEPT_LANGUAGE'];
$screen=$_POST['screen']['width']." х ".$_POST['screen']['height'];
if ($_POST['battery']['proc']>0) $batery_proc=(($_POST['battery']['proc'])*100).'&#37;'; else $batery_proc="Не определено";

if ($_POST['battery']['zar']=='true') $batery_zar="Подключено"; else $batery_zar="Не подключено, или не определено";

if ($_POST['time_lend']<60) $time_in_land=$_POST['time_lend']." сек.";
else if (($_POST['time_lend']>60) AND ($_POST['time_lend']<3600)) $time_in_land=date("i мин. s сек.", mktime(0, 0, $_POST['time_lend']));
else $time_in_land=date("H час. i мин. s сек.", mktime(0, 0, $_POST['time_lend']));

if ($remote_addr=="127.0.0.1") $remote_addr="localhost";
if (stripos($_SERVER['PHP_SELF'], "index"))
	{
		 $visit=$_COOKIE['visit'];
		 $lastip=$_COOKIE['ip'];
		$visit++;
		SetCookie("visit",$visit,time()+$period_cookie);
		SetCookie("time",time(),time()+$period_cookie);
		SetCookie("ip",$remote_addr,time()+$period_cookie); 
		SetCookie("remote_host",$remote_host,time()+$period_cookie); 
				
		$host_path=str_ireplace('index.php','', $_SERVER['PHP_SELF']);
		$domen=str_ireplace("www.", "", $_SERVER['HTTP_HOST']);
		$host=$domen.$host_path;
		$url="{$scheme}://{$domen}";
		$_SESSION['url']=$url;
		$_SESSION['domen']=$domen;
		$_SESSION['host']=$host;
		$server="{$scheme}://{$host}";
		$_SESSION['serv']=$server;
		$server_request_uri="{$scheme}://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
		$_SESSION['server_request_uri']=$server_request_uri;
		require_once("config/session.php");
		if ($_SERVER['HTTP_REFERER']!="") $_SESSION['referer']=$_SERVER['HTTP_REFERER'];
		else $_SESSION['referer']="Не определен.";
		if ($remote_addr!=$lastip) {$geo = Config::info_geo($remote_addr); SetCookie("lastgeo",serialize($geo),time()+$period_cookie);  }
		else {$geo=unserialize($_COOKIE['lastgeo']);}
		$_SESSION['country_code'] = $geo['iso'];
		$_SESSION['country'] = $geo['country'];
		$_SESSION['city']=$geo['city'].", ".$geo['region'].", ".$geo['country'];
		$_SESSION['region']=$geo['region'];
		$_SESSION['geocity']=$geo['city'];
		$country_code = $_SESSION['country_code'];
		$country = $_SESSION['country'];
		$region=$_SESSION['region'];
		$city=$_SESSION['city'];
		$geocity=$_SESSION['geocity'];
		
		}
else {
	$visit=$_COOKIE['visit'];
	$time_cookie=$_COOKIE['time'];
	$ip_cookie=$_COOKIE['ip'];
	$geo_cookie=$_COOKIE['geo'];
	$remote_host_cookie=$_COOKIE['remote_host'];
	if (isset($_SESSION['utms'])) foreach ($_SESSION['utms'] as $key => $value) $utm.="<tr><td><b>".str_pad($key, 14, " ", STR_PAD_RIGHT)."</b> </td><td> {$value}</td></tr>\n";
	if ($visit>1) {
	$visit_text.="<i>".date("d.m.Y H:i:s",$time_cookie)."</i>, ip: {$ip_cookie}</u>, имя Internet-хоста: {$remote_host_cookie} ({$geo_cookie})<br>";
	} else $visit_text="Прошлых визитов за последние {$cookie_days} дней не обнаружено";
	$country_code = $_SESSION['country_code'];
	$city=$_SESSION['city'];
	$geocity=$_SESSION['geocity'];
	$country = $_SESSION['country'];
	$region=$_SESSION['region'];
	$server=$_SESSION['serv'];
	$host=$_SESSION['host'];
	$domen=$_SESSION['domen'];
	$url=$_SESSION['url'];
	$server_request_uri=$_SESSION['server_request_uri'];
}
$device=Config::device_name(Config::is_mobile());
$user_agent=$_SERVER['HTTP_USER_AGENT'];
$browser=Config::user_browser($user_agent);
$os=Config::getOS($user_agent);
$insrtion="https://youtu.be/I56D87MHQnI";
$ins_crm=array(
'LP-CRM' => 'https://youtu.be/I56D87MHQnI',
'e-autopay' => 'https://youtu.be/I56D87MHQnI',
);
