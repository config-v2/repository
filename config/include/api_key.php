<? // Отправка данных в e-autopay
		
$basket[]=array(
	"good_id" =>  $good_id, // идентификатор товара
    "cost" => $price_new.'.00', // цена товара
	"quantity" => 1 // количество товара

);

$customer=array(
	"given_name" => $name,
	"phone" => $phone
);
$credentials=array(
	"created" => date("Y-m-d H:i:s"), // дата заказа 2014-01-01 00:00:00
    "currency" => $valuta, // валюта заказа
);

$order=array(
	"customer" => $customer,
	"credentials" => $credentials,
	"basket" => $basket
);

$data=array(
 "customer_api_key" => $customer_api_key,
 "order" => $order,
);

$data_json=json_encode($data);
print_r($data_json);


$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://api.e-autopay.com/v01/'.$user_api_key.'/orders');
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
echo("<br>____________________<br>");
print_r($out);	
$jout=json_decode($out); $m1=$jout -> status; foreach($jout ->message as $val) { $m2=$m2.$val; } $mess="<tr><td ><b>Ответ LP-СРМ:</b></td><td> {$m1},</td></tr><tr>\n<td><br>Сообщение LP-CRM: {$m2}</td></tr>";	
	