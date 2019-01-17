<?php  // Отправка данных в e-autopay

		
$basket[]=array(
	"good_id" =>  $good_id, // идентификатор товара
    "cost" => $price_new.'.00', // цена товара
	"quantity" => "1" // количество товара

);

$customer=array(
	"surname" => "",
	"given_name" => $name,
	"patronymic" => "",
	"country" => $country, // страна (обязательное)
	"state" => $region, // регион (обязательное)
	"city" => $geocity, // город (обязательное)
	"zip" => "", // индекс (обязательное)
	"address" => "", // адрес (обязательное)
	"email" => "", // email (обязательное)
	"phone" => preg_replace('~[^0-9]+~','',$phone),
);



$credentials=array(
	"created" => date("Y-m-d H:i:s"), // дата заказа 2014-01-01 00:00:00
    "currency" => $valuta, // валюта заказа
	"notes" => $comment,
	"ip" => $remote_addr,
	"referer" => $server_request_uri,
);

$orders[]=array(
	"customer" => $customer,
	"credentials" => $credentials,
	"basket" => $basket
);

$data=array(
 "customer_api_key" => $customer_api_key,
 "orders" => $orders,
);

$data_json=json_encode($data);
//print_r($data_json);

//echo("<br>{$user_api_key}<br>");
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://api.e-autopay.com/v02/'.$user_api_key.'/orders');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-Requested-With: XMLHttpRequest',
            'Accept: application/json, text/javascript, */*; q=0.01')
);
$out = curl_exec($curl);
curl_close($curl);
$jout=json_decode($out,true);
 $m1=$jout['orders']['0']['status']; $m2=$jout['message']['0']; 
$m2.=", OrderID: {$jout['orders']['0']['order_id']}";
$mess="<tr><td><b>Статус заказа e-autopay:</b></td><td> {$m1},</td></tr><tr>\n<td><br> {$m2}</td></tr>";
$crm_tele=	"<b>Статус заказа e-autopay:</b> {$m1}, {$m2}";
// echo("<br>____________________<br>");
// print_r($out);	
	
	