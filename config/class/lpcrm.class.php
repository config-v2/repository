<?php 
class Lpcrm {

public function send($data, $crm_id, $api) // Отправка данных в СРМ
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://{$crm_id}/api/{$api}.html");
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	$out = curl_exec($curl);
	curl_close($curl);
	$send=json_decode($out,true);
	//print_r($send);
	return $send;
}

public function getCategories($key, $crm_id) // 6. Получение категорий товаров из CRM
{
	$data = array(
    'key' => $key, //Ваш секретный токен 
	);
	$getCategories=Lpcrm::send($data, $crm_id, 'getCategories');
	
	return $getCategories;

}

 public function categories ($key, $crm_id)
{
	$categories=Lpcrm::getCategories($key, $crm_id);
	if ($categories['status']=='ok') { echo($categories['status']);
	foreach($categories['data'] as $key1 => $value1) { 
		$allcategories[$value1['id']]=$value1['name'];
			foreach($value1['subcategories'] as $key2 => $value2) $allcategories[$value2['id']]=$value2['name'];
					foreach($value2['subcategories'] as $key3 => $value3) $allcategories[$value3['id']]=$value3['name'];
						//foreach($value3['subcategories'] as $key4 => $value4) $allcategories[$value4['id']]=$value4['name'];
						//	foreach($value4['subcategories'] as $key5 => $value5) $allcategories[$value5['id']]=$value5['name'];
			}
			}
		
			
	
	
	return $allcategories;
} 

}