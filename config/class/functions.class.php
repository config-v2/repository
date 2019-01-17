<?php  
class Config {

public function GetRealIp() {
  if($_SERVER) {
    if($_SERVER['HTTP_X_FORWARDED_FOR'])
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    elseif($_SERVER['HTTP_CLIENT_IP'])
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    else
      $ip = $_SERVER['REMOTE_ADDR'];
  }
  else {
    if(getenv('HTTP_X_FORWARDED_FOR'))
      $ip = getenv('HTTP_X_FORWARDED_FOR');
    elseif(getenv('HTTP_CLIENT_IP'))
      $ip = getenv('HTTP_CLIENT_IP');
    else
      $ip = getenv('REMOTE_ADDR');
  }
 
  return $ip;
}


   public function proxy_func(){ // Определяем прокси
	$proxy=0;
        $proxy_headers = array(
            'HTTP_VIA',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_FORWARDED',
            'HTTP_CLIENT_IP',
            'HTTP_FORWARDED_FOR_IP',
            'VIA',
            'X_FORWARDED_FOR',
            'FORWARDED_FOR',
            'X_FORWARDED',
            'FORWARDED',
            'CLIENT_IP',
            'FORWARDED_FOR_IP',
            'HTTP_PROXY_CONNECTION'
        );
        foreach($proxy_headers as $x){
            if (isset($_SERVER[$x])){
                $proxy++;
            }
        }
		
        return $proxy;
    }
	
	 public function isProxy(){
		
		 if (Config::proxy_func()>0) return "Обнаружен"; else return "Не обнаружен";
	 }
	
	public function is_bot()
	{
		$is_bot = preg_match(
 "~(Google|Googlebot|nuhk|Yahoo|Yammybot|Rambler|Openbot|Bot|Slurp|msnbot|Ask Jeeves\/Teoma|ia_archiver|Yandex|Spider|Snoopy|Crawler|Finder|Mail|curl)~i", $_SERVER['HTTP_USER_AGENT']);
 return $is_bot;

	}
	
	
	public function curl_get_contents($url) {

    $timeout = 5; 
    $useragent = $_SERVER['HTTP_USER_AGENT']; 

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); 
    $data = curl_exec($ch); 
    curl_close($ch); 

    return $data; 
	
}

	
	
	public function geo_2ip($ip){
		$geo = json_decode(file_get_contents('https://api.2ip.ua/geo.json?ip='.$ip), true);
		if ($geo['country_rus']=='') $geo = json_decode(file_get_contents('http://api.2ip.ua/geo.json?ip='.$ip), true);
		return $geo;
	}
	
	public function geo_ip($ip)
	{
		$geo = json_decode(file_get_contents('https://api.sypexgeo.net/json/'.$ip), true);
		if ($geo['country']['name_ru']=='') $geo = json_decode(file_get_contents('http://api.sypexgeo.net/json/'.$ip), true);
	
	return $geo;
	}
	
	public function ipgeobase($ip)
	{
		$geobase=array();
		$xml_ip=Config::curl_get_contents('http://ipgeobase.ru:7020/geo/?ip='.$ip);
		$geo = new SimpleXMLElement($xml_ip);
		$geobase['mask']= trim($geo->ip[0]->inetnum);
		$geobase['country']=trim($geo->ip[0]->country);
		$geobase['city']=trim($geo->ip[0]->city);
		$geobase['region']=trim($geo->ip[0]->region);
		$geobase['district']=trim($geo->ip[0]->district);
		return $geobase;
	}
	

	
	public function info_geo($ip)
	{
		if ((!Config::is_bot()) AND ($ip!="localhost")) {
			$geo=Config::ipgeobase($ip);
			require_once('../data/countries_ru.php');
		$infogeo_ip['country']=$countries[$geo['country']];
		$infogeo_ip['iso']=$geo['country'];
		$infogeo_ip['city']=$geo['city'];
		$infogeo_ip['region']=$geo['region'];
	
		} else 
	{
		$infogeo_ip['country']="Локалхост";
		$infogeo_ip['iso']='AA';
		$infogeo_ip['city']='Мухосранск';
		$infogeo_ip['region']="Задрыщенский уезд";
	}
		return $infogeo_ip;
	}
	
		public function info_geo_old($ip)
	{
		if ((!Config::is_bot()) AND ($ip!="localhost")) {
			$geo=Config::geo_ip($ip);
			if ($geo['city']['name_ru']!='') {
		$infogeo_ip['country']=$geo['country']['name_ru'];
		$infogeo_ip['iso']=$geo['country']['iso'];
		$infogeo_ip['city']=$geo['city']['name_ru'];
		$infogeo_ip['region']=$geo['region']['name_ru'];
		} else { $geo=Config::geo_2ip($ip);
		$infogeo_ip['country']=$geo['country_rus'];
		$infogeo_ip['iso']=$geo['country_code'];
		$infogeo_ip['city']=$geo['city_rus'];
		$infogeo_ip['region']=$geo['region_rus'];
		
		}
		} else 
	{
		$infogeo_ip['country']="Локалхост";
		$infogeo_ip['iso']='AA';
		$infogeo_ip['city']='Мухосранск';
		$infogeo_ip['region']="Задрыщенский уезд";
	}
		return $infogeo_ip;
	}
 
 public function is_ip($ip, $list_ip) // принадлежность ip списку
 {
	if ($list_ip!="") {
	$all_ip = preg_split("/[\s,]+/", $list_ip); 
	if (in_array($ip, $all_ip )) {$is_ip=1; echo ("ok");} else {$is_ip=0;}
	} else {$is_ip=0;}
	return $is_ip;
 }
 
 public function month_rus($date,$s='')
 {
	 if ($s=='true') $month=array('','Января','Февраля','Марта','Апреля','Мая','Июня','Июля','Августа','Сентября','Октября','Ноября','Декабря');
	 else $month=array('','Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь');
	 return $month[$date];
 }
 
 public function week_rus($day, $s='')
 {
	 if ($s=='true') $week=array('','Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс');
	 else $week=array('','Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Субота', 'Воскресенье');
	 return $week[$day];
 }
 
 public function date_rus()
	{
		$date=config::week_rus(date("N"),true).", ".date("j")." ".config::month_rus(date("n"),true)." ".date("Y")." г.";
		return $date;
	}



public function translit($s) 
{ // Транслитерция кириллица -> латиница, для ссылок
	$s = (string) $s; // преобразуем в строковое значение
	$s = strip_tags($s); // убираем HTML-теги
	$s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
	$s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
	$s = trim($s); // убираем пробелы в начале и конце строки
	
	$s = function_exists('mb_strtolower') ? mb_strtolower($s , 'UTF-8') : strtolower($s, 'UTF-8'); // переводим строку в нижний регистр (иногда надо задать локаль)
	$s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
	$s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
	$s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
return $s; // возвращаем результат
}

public function scheme()
{
if (isset($_SERVER['HTTPS']))
    $scheme = $_SERVER['HTTPS'];
else
    $scheme = '';
if (($scheme) && ($scheme != 'off')) $scheme = 'https';
else $scheme = 'http'; 
return $scheme;
}
}
?>