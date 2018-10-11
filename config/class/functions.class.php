<? 
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
	

	
	public function info_geo($ip)
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
 
 public function date_rus()
	{
		$month=array('','Января','Февраля','Марта','Апреля','Мая','Июня','Июля','Августа','Сентября','Октября','Ноября','Декабря');
		$week_short=array('','Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс');
		$date=$week_short[date("N")].", ".date("j")." ".$month[date("n")]." ".date("Y")." г.";
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