<?php 
require_once('config/class/lpcrm.class.php');

$products_list = array(
    1 => array( 
            'product_id' => $product_id_crm,    //код товара (из каталога CRM)
            'price'      => $price_new, //цена товара 1
            'count'      => '1'                      //количество товара 1
    ),  
    
);
$products_crm = urlencode(serialize($products_list));
 if ($country_crm=="auto")  $country_crm = $country_code;

 if ($_POST['formname']!="") $additional_2="Форма не указана"; else $additional_2=$_POST['formname'];

$sender = urlencode(serialize($_SERVER));
// параметры запроса
$data = array(
    'key'             => $key_crm, //Ваш секретный токен
    'order_id'        => number_format(round(microtime(true)*10),0,'.',''), //идентификатор (код) заказа (*автоматически*)
    'country'         => $country_crm,                         // Географическое направление заказа
    'office'          => $office_crm,                          // Офис (id в CRM)
    'products'        => $products_crm,                    // массив с товарами в заказе
    'bayer_name'      => $name,            // покупатель (Ф.И.О)
    'phone'           => $phone,           // телефон
    'email'           => $email_client,           // электронка
    'comment'         => $comment,    // комментарий
    'delivery'        => $delivery_crm,        // способ доставки (id в CRM)
    'delivery_adress' => $city, // адрес доставки
    'payment'         => $payment_crm,                           // вариант оплаты (id в CRM)
    'sender'          => $sender,                        
    'utm_source'      => $_SESSION['utms']['utm_source'],  // utm_source
    'utm_medium'      => $_SESSION['utms']['utm_medium'],  // utm_medium
    'utm_term'        => $_SESSION['utms']['utm_term'],    // utm_term
    'utm_content'     => $_SESSION['utms']['utm_content'], // utm_content
    'utm_campaign'    => $_SESSION['utms']['utm_campaign'],// utm_campaign
	'additional_1'    => "Реферер: {$referer}",                   // Дополнительное поле 1
    'additional_2'    => $additional_2,                           // Дополнительное поле 2
    'additional_3'    => "Визитов: {$visit}, Время на сайте: {$time_in_land} | Предыдущий визит: {$visit_text_tele}", // Дополнительное поле 3
    'additional_4'    => "{$device}: {$os}, {$lang}, {$browser}, {$screen} | Батарея: {$batery_proc}, зарядное: {$batery_zar}"  // Дополнительное поле 4
);
 
// запрос
$jout=Lpcrm::send($data, $idcrm, 'addNewOrder');
 $m1=$jout['status']; $m2=$jout['message']['0'];
$m2.=", OrderID: {$jout['data']['0']['order_id']}"; $_SESSION['order_id']=$jout['data']['0']['order_id']; 
$mess="<tr><td><b>Ответ LP-СРМ:</b></td><td> {$m1},</td></tr><tr>\n<td><br>Сообщение LP-CRM: {$m2}</td></tr>";
$crm_tele=	"<b>Ответ LP-СРМ:</b> {$m1}, {$m2}";
$_SESSION['orderid']=$data['order_id'];
