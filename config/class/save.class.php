<?php  
class save_config {
public function config($str)
	{
		//include("../options/value.php");
			//$str = str_replace(' "', ' &#171;', $str);
			//$str = str_replace('" ', '&#187; ', $str);
			$str = str_replace('"', "'", $str);
			$str = str_replace('"', "'", $str);
			$str = str_replace("%visit%", '{$visit}', $str);
			$str = str_replace("%visit_text%", '{$visit_text}', $str);
			$str = str_replace("%valuta%", '{$valuta}', $str);
			$str = str_replace("%currency%", '{$valuta}', $str);
			
			$str = str_replace("%price_new%", '{$price_new}', $str);
			$str = str_replace("%price_old%", '{$price_old}', $str);
			$str = str_replace("%skidka%", '{$skidka}', $str);
			$str = str_replace("%discount%", '{$skidka}', $str);
			$str = str_replace("%sender%", '{$sender}', $str);
			$str = str_replace("%product%", '{$product}', $str);
			$str = str_replace("%domen%", '{$domen}', $str);
			$str = str_replace("%timezone%", '{$timezone_user}', $str);
			
			$str = str_replace("%date%", '{$date}', $str);
			$str = str_replace("%time%", '{$time}', $str);
			$str = str_replace("%ip%", '{$remote_addr}', $str);
			$str = str_replace("%remote_host%", '{$remote_host}', $str);
			$str = str_replace("%host%", '{$host}', $str);
			$str = str_replace("%server%", '{$server}', $str);
			$str = str_replace("%lang%", '{$lang}', $str);
			$str = str_replace("%agent%", "{".'$user_agent'."}", $str);
			$str = str_replace("%device%", '{$device}', $str);
			$str = str_replace("%os%", '{$os}', $str);
			$str = str_replace("%screen%", '{$screen}', $str);
			$str = str_replace("%batery_proc%", '{$batery_proc}', $str);
			$str = str_replace("%batery_zar%", '{$batery_zar}', $str);
			$str = str_replace("%time_land%", '{$time_in_land}', $str);
			$str = str_replace("%country_code%", '{$country_code}', $str);
			$str = str_replace("%country%", '{$country}', $str);
			$str = str_replace("%browser%", '{$browser}', $str);
			$str = str_replace("%refer%", '{$referer}', $str);
			$str = str_replace("%utm%", '{$utm}', $str);
			$str = str_replace("%city%", '{$city}', $str);
			$str = str_replace("%proxy%", '{$proxy}', $str);
			$str = str_replace("%utm_campaign%", "{".'$_SESSION[\'utms\'][\'utm_campaign\']'."}", $str);
			$str = str_replace("%utm_source%", "{".'$_SESSION[\'utms\'][\'utm_source\']'."}", $str);
			$str = str_replace("%utm_medium%", "{".'$_SESSION[\'utms\'][\'utm_medium\']'."}", $str);
			$str = str_replace("%utm_content%", "{".'$_SESSION[\'utms\'][\'utm_content\']'."}", $str);
			$str = str_replace("%utm_term%", "{".'$_SESSION[\'utms\'][\'utm_term\']'."}", $str);
			return $str;
	}
}
?>