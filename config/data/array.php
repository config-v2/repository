<?
$config=array(
 'ver' => "2.0",
 'site_conf' => "https://config-v2.github.io/",
 'site_gg' => 'https://greygler.github.io',
 'powered' => 'Powered by GreyGler',
 'mask'=> array(
	'_ru'	=> ' +7 (___) ___-__-__',
	'_ru8'	=> '  8 (___) ___-__-__',
	'_ua' 	=> '+38 (0__) ___-__-__',
	'_by'	=> '+37 (5__) ___-__-__',
	'_kz'	=> '+7 (7__) ___-__-__',
),
 'valuta' => array('р','руб','₽','грн','₴','б.р','бел. руб','Br','тг','тенге','₸'), // Валюта
 'geo' => array(
	'RU' => 'Россия		(страна «RU», валюта «RUB»)',
    'UA' => 'Украина	(страна «UA», валюта «UAH»)',
    'BY' => 'Беларусь	(страна «BY», валюта «BYN»)',
    'KZ' => 'Казахстан	(страна «KZ», валюта «KZT»)'
 ),
 'email' => array( // Отправка на Е-mail
	'sender' =>'%product% <noreply@%host%>',
	'subject' => 'Заказ товара - %product%',
	'message' => "<table border='0'>
	<tr><td colspan='2' height='40' ><p align='center'><i>Информация о покупателе:</i></td></tr>
	<tr><td><b>IP покупателя:</b></td><td>%ip%</td></tr><tr>
	<td><b>Использование прокси:</b></td><td>%proxy%</td></tr>
	<tr><td><b>Страна (по IP):</b></td><td>%country_code%</td></tr>
	<tr><td><b>Город (по IP):</b></td><td>%city%</td></tr>
	<tr><td><b>Установленный язык:</b> </td><td>%lang%</td></tr>
	<tr><td><b>Браузер: </b> </td><td>%browser%</td></tr>
	<tr><td><b>Устройство:</b></td><td>%device%</td></tr>
	<tr><td><b>ОС:</b></td><td>%os%</td></tr>
	<tr><td><b>Время на ленде:</b></td><td>%time_land%</td></tr>
	<tr><td><b>Кол-во визитов:</b></td><td>%visit%</td></tr>
	<tr><td valign='top'><b>Прошлые визиты:</b></td>
	<td>%visit_text%</td></tr>
	<tr><td><b>Разрешение экрана:</b></td><td>%screen%</td></tr>
	<tr><td><b>Заряд батареи:</b></td><td>%batery_proc%</td></tr>
	<tr><td><b>Зарядное устройство:</b></td><td>%batery_zar%</td></tr>
	<tr><td><b>Реферер:</b></td><td><a href='%refer%' target='_blank'>%refer%</a></td></tr>
	<tr><td colspan='2'><p align='center'><b>UTM-метки: </b></p>%utm% </td></tr>
	<tr><td><b>Комментарий к заказу:  </b></td><td><p>%comment%</p></td></tr>
	</table>",
 ),
 'pokup' => array( //Тригер "Покупатели на сайте"
	 'pokup1' =>  21, // На сайте
	 'pokup1n' => 15, // Обновление, сек
	 'pokup2' => 24,  //Покупок сегодня
	 'pokup2n' => 23, //Обновление, сек
 
 ),
 'sovp' => array( // Тригер "Совершенные покупки"
	 'tovar' => 1, // Максимaльное количество шт товара в покупке
	 'vsego' => 10, // Количество сгенерированных покупателей
	 'delay1' =>30, // Задержка в секундах перед первым показом
	 'delay2' =>10 // Задержка в сeкундах между показами:
 ),
 'modal' => array(
	 'modal_title' => 'Понравилось это предложение?', // Заголовок окна
	 'modal_text' => 'Мы расскажем Вам все о нашем товаре, предложим наилучшие условия и ознакомим с подходящими акционными предложениями!', // Текст окна
	 'modal_text2' => 'Оператор перезвонит Вам через 15-30 минут.', // Подпись окна
	 'button' => 'ПЕРЕЗВОНИТЬ МНЕ', //Призыв к действию
	 'modal_delay' => 30 //Задержка в секундах перед показом
 ),
 'upsel' => array(
 'upsel_title' => "C этим товаром обычно покупают", // Заголовок допродажи
 'upsel_pic_h' => 150, //Высота картинки
 'upsel_url_title' =>  'Заказывайте у менеджера при звонке' // Подпись ccылки
 )
);

$json=json_encode($config);
//print_r($json);
$config=json_decode($json, true);
//print_r($config);
?>