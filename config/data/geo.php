<?
if ($remote_addr!="localhost"){

    $timeout = 5; 
 	$url='http://ipgeobase.ru:7020/geo/?ip='.$remote_addr;

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_USERAGENT, $user_agent); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); 
    $data = curl_exec($ch); 
    curl_close($ch); 
	if ($data!="")
	{
		$geoxml = new SimpleXMLElement($data);
		$geo['iso']=trim($geoxml->ip[0]->country);
		$geo['country']=$countries[$geo['iso']];
		$geo['city']=trim($geoxml->ip[0]->city);
		$geo['region']=trim($geoxml->ip[0]->region);
	}
	else {
		$geo=Config::info_geo_old($remote_addr);
	}
				
} else {
		$geo['country']="Локалхост";
		$geo['iso']='AA';
		$geo['city']='Мухосранск';
		$geo['region']="Задрыщенский уезд";
}
	?>