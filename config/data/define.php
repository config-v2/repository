<?php
$time_land='3';
$cookie_days = 30; // Период cookie в днях
$period_cookie = $cookie_days*24*60*60; // Пересчет в секунды
$_SESSION['period_cookie']=$period_cookie;
$date=Config::date_rus();
$time=date('H:i:s');

if (stripos($_SERVER['PHP_SELF'], "index"))
	{
		$visit=$_COOKIE['visit'];
		$_SESSION['lastip']=$_COOKIE['ip'];
		$_SESSION['lasttime']=$_COOKIE['time'];
		$_SESSION['lastremotehost']=$_COOKIE['remote_host'];
		
		$visit++;
		$remote_addr=Config::GetRealIp();
		$remote_host=@gethostbyaddr($remote_addr);
		if ($remote_host==$remote_addr) $remote_host="Не определен";
		if ($remote_addr=="127.0.0.1") $remote_addr="localhost";
		SetCookie("visit",$visit,time()+$period_cookie);
		SetCookie("time",time(),time()+$period_cookie);
		SetCookie("ip",$remote_addr,time()+$period_cookie); 
		SetCookie("remote_host",$remote_host,time()+$period_cookie); 
		$proxy=Config::isProxy();
		$_SESSION['proxy']=$proxy;
		$host_path=str_ireplace('index.php','', $_SERVER['PHP_SELF']);
		$domen=str_ireplace("www.", "", $_SERVER['HTTP_HOST']);
				$scheme=Config::scheme();
		
		$lang_array=explode(";", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
		$lang=$lang_array[0];
		$_SESSION['remote_addr']=$remote_addr;
		$_SESSION['scheme']=$scheme;
		$_SESSION['remote_host']=$remote_host;
		$_SESSION['lang']=$lang;
		$host=$domen.$host_path;
		$url="{$scheme}://{$domen}";
		$_SESSION['url']=$url;
		$_SESSION['domen']=$domen;
		$_SESSION['host']=$host;
		$server="{$scheme}://{$host}";
		$_SESSION['serv']=$server;
		$server_request_uri="{$scheme}://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
		$_SESSION['server_request_uri']=$server_request_uri;
		require_once("config/include/session.php");
		$_SESSION['referer']=$_SERVER['HTTP_REFERER']; 
		$user_agent=$_SERVER['HTTP_USER_AGENT'];
		if ($_COOKIE['city']!='') {
			$_SESSION['last_city']=$_COOKIE['city'];
			$_SESSION['last_region']=$_COOKIE['region'];
			$_SESSION['last_country']=$_COOKIE['country'];
			$_SESSION['last_country_code']=$_COOKIE['country_code'];
			
		}
		$_SESSION['user_agent']=$user_agent;
		
		
		//if ($remote_addr!=$_SESSION['lastip']) {
		//	include('config/data/countries_ru.php');
		//	include('config/data/geo.php');
		//	SetCookie("lastgeo",serialize($geo),time()+$period_cookie);  }
	//	else {$geo=unserialize($_COOKIE['lastgeo']);}
		
		
	//	$_SESSION['country_code'] = $geo['iso'];
	//	$_SESSION['country'] = $geo['country'];
	//	$_SESSION['city']=$geo['city'].", ".$geo['region'].", ".$geo['country'];
	//	$_SESSION['region']=$geo['region'];
	//	$_SESSION['geocity']=$geo['city'];
	//	$country_code = $_SESSION['country_code'];
	//	$country = $_SESSION['country'];
	//	$region=$_SESSION['region'];
	//	$city=$_SESSION['city'];
	//	$geocity=$_SESSION['geocity'];
		$browser_class = new Browser();
		$browser=$browser_class->getBrowser()." v.".$browser_class->getVersion();
		$_SESSION['browser']=$browser;
		$os=$browser_class->getPlatform();
		$_SESSION['os']=$os;
		if ($browser_class->isMobile()) $device="Mobile"; else
		if ($browser_class->isTablet()) $device="Tablet"; else $device="Desktop";
		$_SESSION['device']=$device;
		
				}
		
else {
	$visit=$_COOKIE['visit'];
	$proxy=$_SESSION['proxy'];
	$remote_addr=$_SESSION['remote_addr'];
	$scheme=$_SESSION['scheme'];
	$remote_host=$_SESSION['remote_host'];
	$lang=$_SESSION['lang'];
	$timezone_user=$_POST['tz'];
	if ($_SESSION['referer']!="") $referer=$_SESSION['referer']; else
		if ($_POST['referer']!="") $referer=$_POST['referer']; else $referer="Не определен.";
	
	$screen=$_POST['screen']['width']." х ".$_POST['screen']['height']." х ".$_POST['screen']['color'];
	if ($_POST['battery']['proc']>0) $batery_proc=(($_POST['battery']['proc'])*100).'&#37;'; else $batery_proc="Не определено";
	if ($_POST['battery']['zar']=='true') $batery_zar="Подключено"; else $batery_zar="Не подключено, или не определено";
	if ($_POST['time_lend']<60) $time_in_land=$_POST['time_lend']." сек.";
	else if (($_POST['time_lend']>60) AND ($_POST['time_lend']<3600)) $time_in_land=date("i мин. s сек.", mktime(0, 0, $_POST['time_lend']));
	else $time_in_land=date("H час. i мин. s сек.", mktime(0, 0, $_POST['time_lend']));
	if (isset($_SESSION['utms'])) foreach ($_SESSION['utms'] as $key => $value) $utm.="<tr><td><b>".str_pad($key, 14, " ", STR_PAD_RIGHT)."&nbsp;</b> </td><td> {$value}</td></tr>\n";
	if ($visit>1) {
		$time_cookie=$_SESSION['lasttime'];
		$ip_cookie=$_SESSION['lastip'];
		$remote_host_cookie=$_SESSION['lastremotehost'];
		
		
		$_SESSION['last_city']=$_COOKIE['city'];
			$_SESSION['last_region']=$_COOKIE['region'];
			$_SESSION['last_country']=$_COOKIE['country'];
			$_SESSION['last_country_code']=$_COOKIE['country_code'];
		
		if ($_SESSION['last_city']!="") { $last_geo=$_SESSION['last_city'].", ".$_SESSION['last_region'].", ".$_SESSION['last_country']; }
			
	$visit_text=date("d.m.Y H:i:s",$time_cookie).",%0A ip: {$ip_cookie}, Хост: {$remote_host_cookie} ({$last_geo})";
	$visit_text_tele=date("d.m.Y H:i:s",$time_cookie).", ip: {$ip_cookie}, ({$last_geo})";
	} else {$visit_text="Прошлых визитов за последние {$cookie_days} дней не обнаружено"; 
			$visit_text_tele="последние {$cookie_days} дней не обнаружено"; }
	$country_code = $_COOKIE['country_code'];
	$geocity= $_COOKIE['city'];
	$country = $_COOKIE['country'];
	$region = $_COOKIE['region'];
	$city=$geocity.",".$region.",".$country;
	$server=$_SESSION['serv'];
	$host=$_SESSION['host'];
	$domen=$_SESSION['domen'];
	$url=$_SESSION['url'];
	$server_request_uri=$_SESSION['server_request_uri'];
	$user_agent=$_SESSION['user_agent'];
	$browser=$_SESSION['browser'];
	$os=$_SESSION['os'];
	$device=$_SESSION['device'];
}

$insrtion="https://youtu.be/bHGkCu3VhEk";
$ins_crm=array(
'LP-CRM' => 'https://youtu.be/bHGkCu3VhEk',
'e-autopay' => 'https://youtu.be/bHGkCu3VhEk',
);
