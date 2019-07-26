<?php

$data = array(


    'name'    		  => $name,             // покупатель (Ф.И.О)
    'phone'           => $phone ,           // телефон
    'price'			 => $price_new,
    'uuid'           => $key_product,           // id товара
//    'comment'         => $_POST['product_name'],    // комментарий

//    'utm_source'      => $_SESSION['utms']['utm_source'],  // utm_source
//    'utm_medium'      => $_SESSION['utms']['utm_medium'],  // utm_medium
//    'utm_term'        => $_SESSION['utms']['utm_term'],    // utm_term
//    'utm_content'     => $_SESSION['utms']['utm_content'], // utm_content
//    'utm_campaign'    => $_SESSION['utms']['utm_campaign'] // utm_campaign
);


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://crm1.top/api/order-from-landing",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($data),
  CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "Content-Type: application/json",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  $m1= "cURL Error #:" . $err;
} else {
  $m1= $response;
}

$mess="<tr><td><b>Ответ CRM1.TOP:</b></td><td> {$m1},</td></tr>";
$crm_tele=	"<b>Ответ CRM1.TOP:</b> {$m1}";
