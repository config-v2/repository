<?
//print_r($_POST);
if (($_POST['valuta']!="") OR ($_POST['product']!="")){
	$file_bak='../data/value.bak';
	$file_value='../data/value.php';
	$file_value1='../data/value1.php';
	$ups_pic_dir='../upsel_img/';
	$file_config='../../config.php';
	$str_up=str_repeat("* ", 22);
	if (isset($_SERVER['HTTPS'])) $scheme = $_SERVER['HTTPS']; else $scheme = '';
if (($scheme) && ($scheme != 'off')) $scheme = 'https'; else $scheme = 'http';
$host_path=str_ireplace('options/config_save.php','', $_SERVER['PHP_SELF']);
$host=$_SERVER['HTTP_HOST'].$host_path;
$server="{$scheme}://{$host}";
require_once("../class/save.class.php");
require_once("../data/array.php");
$file_conf="Configuration v.{$config['ver']} for LandingPage: ";
$last_edit="Last edition by ".date('d.m.Y, H:i:s');
$create="Created for {$_SERVER['SERVER_NAME']}";
$power1=$config['powered'];
$power2=$config['site_gg'];
$text="<?php\n/* {$str_up}\n";
$text.=" * ".str_pad($file_conf, 41, " ", STR_PAD_BOTH)." *\n";
$text.=" * ".str_pad($create, 41, " ", STR_PAD_BOTH)." *\n";
$text.=" * ".str_pad($last_edit, 41, " ", STR_PAD_BOTH)." *\n";
$text.=" {$str_up}*/\n\n";
$text2=$text."session_start();\nrequire_once(\"config/class/browser.class.php\");\nrequire_once(\"config/class/functions.class.php\");\nrequire_once(\"config/class/lands.class.php\");\nrequire_once(\"config/data/define.php\");\n";

if ($_FILES["upsel_pic"]["name"]!="") {if (!file_exists($ups_pic_dir)) mkdir($ups_pic_dir); move_uploaded_file($_FILES["upsel_pic"]["tmp_name"], $ups_pic_dir.$_FILES["upsel_pic"]["name"]);
}
if ($_FILES["og_pic"]["name"]!="") move_uploaded_file($_FILES["og_pic"]["tmp_name"], "../../".$_FILES["og_pic"]["name"]);
//echo("<br>===</br>");
//print_r($_FILES);
 foreach($_POST as $key => $value) {
	//$value = str_replace("'", "\'", $value);
	
	//echo("{$key} = {$value}<br>");
	
	if (stripos($key, "64")) {$value_save=base64_encode($value); $value=base64_encode(trim($value));} 
	else if (stripos($key, "html")) {$value_save=htmlspecialchars($value); $value=htmlspecialchars(trim($value));} 
	else {$value_save=save_config::config(trim($value)); 
	$value = str_replace('"', '\"', $value);}
	//if (($key=="contact_email") AND ($value=="")) $value=$_POST['email'];
  
		//$s="$".$key." = "."'{$value_save}';\n";
		$s="$".$key." = \"".$value."\";\n";
		$s2="$".$key." = \"".$value_save."\";\n";
        //echo("{$key} = {$value_save}<br>");
	$text.=$s; 
	$text2.=$s2;
}
if ($_POST['price_old_select']=='1') 		{$text.="$"."price_old = floor(($"."price_new/(100-$"."skidka))*100);\n"; $text2.="$"."price_old = floor(($"."price_new/(100-$"."skidka))*100);\n";}
else {$text.="$"."skidka = 100-floor(($"."price_new/$"."price_old)*100);\n"; $text2.="$"."skidka = 100-floor(($"."price_new/$"."price_old)*100);\n";}
if ($_FILES["upsel_pic"]["name"]!=""){
$text.="$"."upsel_pic = '{$_FILES["upsel_pic"]["name"]}';\n"; 
$text2.="$"."upsel_pic = '{$_FILES["upsel_pic"]["name"]}';\n";
}
if ($_FILES["og_pic"]["name"]!=""){
$text.="$"."og_pic = '{$_FILES["og_pic"]["name"]}';\n"; 
$text2.="$"."og_pic = '{$_FILES["og_pic"]["name"]}';\n";
}
$text.="$"."ver='".$config['ver']."';\n"."$"."power1='".$power1."';\n"."$"."power2='".$power2."';\n".'$time_land=3;'."\n";

//$footer.='$os=getOS($_SERVER[\'HTTP_USER_AGENT\']);'."\n";
$footer.="\n/* {$str_up}\n";
$footer.=" * ".str_pad($create, 41, " ", STR_PAD_BOTH)." *\n";
$footer.=" * ".str_pad($power1, 41, " ", STR_PAD_BOTH)." *\n";
$footer.=" * ".str_pad($power2, 41, " ", STR_PAD_BOTH)." *\n";
$footer.=" {$str_up}*/\n\n";
$text.="{$footer}?>\n";
$sender=save_config::config($_POST['sender']);
$text2.="$"."currency=$"."valuta; $"."discount=$"."skidka;\n";
$text2.="$"."header=\"Content-type: text/html;charset=utf-8\\"."r\\"."nFrom: "."{"."$"."sender"."}"."\\"."r\\"."n\";\n";
$text2.='if (config::is_ip($remote_addr,$ip_block)==true) {include("config/blockip/index.php"); exit();}';
$text2.="\n{$footer}\n?>\n";
file_put_contents($file_value1, $text);
file_put_contents($file_config, $text2);
if (file_exists($file_bak)) unlink($file_bak);
if (file_exists($file_value)) rename($file_value, $file_bak);
rename($file_value1, $file_value);
$save=1;
}
else{
	$save=2;
}
//echo $save;

$suces_url="Location: {$server}?save={$save}";
header($suces_url);
?>