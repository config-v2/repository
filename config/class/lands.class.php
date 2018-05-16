<?
class Lands{
	
	public function currency($country)
	{
		switch ($country) {
		case 'UA': 	$currency='UAH';	break;
		case 'RU': 	$currency='RUB';	break;
		case 'BY': 	$currency='BYN';	break;
		case 'KZ': 	$currency='KZT';	break;
		
		default: { $currency='RUB';	}
		}
		return $currency;
	}
	
	public function og($price, $title, $desc, $img, $country )
	{
		
		if (isset($_SERVER['HTTPS']))
		$scheme = $_SERVER['HTTPS'];
			else
		$scheme = '';
		if (($scheme) && ($scheme != 'off')) $scheme = 'https';
			else $scheme = 'http';
		?>
		
	<meta property="og:title" content="<?= $title ?>" />
	<meta property="og:description" content="<?= $desc ?>" />
	
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?= $server ?>" />
	<meta property="og:image" content="<?= $server ?>/<?= $img ?>" />
	
	<!-- Для товара  -->
	<meta property="og:price:amount" content="<?= $price ?>">
	<meta property="og:price:currency" content="<?= Lands::currency($country_code) ?>">
	
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="<?= $title ?>">
	<meta name="twitter:description" content="<?= $desc ?>">
	<meta name="twitter:image" content="<?= $server ?>/<?= $img ?>" />
	<meta name="twitter:image:width" content="240">
	
	<meta itemprop="name" content="<?= $title ?>"/>
	<meta itemprop="description" content="<?= $desc ?>"/>
	<?
	} 
	
	public function head($head_index64)
	{
		if (file_exists("config/data/value.php")) include("config/data/value.php");
		if ($og_tag=='1') lands::og($price_new, $og_title, $og_desc, $og_pic, $country_script );
		?>
		<script>var jQ = false;function initJQ(){if(typeof(jQuery)=='undefined'){if(!jQ){jQ = true;document.write('<scr'+'ipt type="text/javascript"src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></scr'+'ipt>');}setTimeout('initJQ()',50);}else{(function($){$(function(){	console.log("this is jq"); });})(jQuery);}}initJQ();</script> <?
		echo(base64_decode($head_index64));
	}
	
	public function body($body_index64)
	{
		if (file_exists("config/data/value.php")) include("config/data/value.php");
		if ($script_pokup==1) { ?>
		<script>
		$(document).ready(function(){		
		$('<link rel="stylesheet" href="config/css/insite.css">').appendTo('head');	});
		var timerId = setInterval(function() {
			$('#pokup').fadeOut(200)
			var pokup2 = $('#pokup').text();
			var	pokup2_new=Number(pokup2)+1;
		
			$('#pokup').fadeIn(200).text(pokup2_new);
			}, <?= $pokup2n?>000);
		var timerId = setInterval(function() {
			$('#insite').fadeOut(200)
			var pokup1 = $('#insite').text();
			var	pokup1_new=Number(pokup1)+1;
		
			$('#insite').fadeIn(200).text(pokup1_new);
			}, <?= $pokup1n?>000);
		
		</script>
		<? echo('<div class="insite">Сейчас на сайте: <span id="insite">'.$pokup1.'</span> | Покупок сегодня: <span id="pokup">'.$pokup2.'</span></div>');
		}
		echo(base64_decode($body_index64));
	}
	
	public function random_name($ipol)
	{
		$pol=array("m","w","n","w","m");
		$name['w'] = array("Татьяна", "Светлана", "Елена", "Алина", "Екатерина", "Дарья", "Анжела", "Кристина", "Мирослава","Валерия","Маргарита","Евгения","Александра","Виктория","Анастасия","Мария","Ольга","Карина","Ксения","Наталья","Марина","Светлана","Вера");
		$surname['w'] = array("Смирновa","Абрамовa","Авдеевa","Блиновa","Большаковa","Волковa","Дмитриевa","Зуевa","Капустинa","Котовa","Макаровa","Моисеевa","Никоновa","Осиповa","Поповa","Русаковa","Селезнёвa","Соболевa","Трофимовa","Федотовa","Черновa","Щукинa","Репникова","Носова","Лебедьева","Журавлева","Сазонова","Кузнецова","Хохлова","Фадеева","Молчанова","Игнатова","Литвинова","Ершова","Ушакова","Дементьева","Рябова","Мухина","Калашникова","Леонтьева","Лобанова","Кузина","Корнеева","Евдокимова","Бородина","Платонова","Некрасова","Балашова","Боброва","Жданова","Блинова","");
		$surname['n'] = array("Кравец","Кравченко","Ковальчук","Матвиенко","Удовиченко","Мережко","Полищук","Вдовиченко","Бутенко","Дзюба","Гончарук","Кондратюк","Рубан","Лавренко","Овчаренко","Косенко","Тимченко","Сербиненко","Прокопенко","Кавун","Голуб","Маланюк","Пилипенко","Сердюк","Говоруха","Верховодько","Ткаченко","Лещенко","Собчак","Гузенко","Горобец","Воробей","Тимошенко","Романюк","Мишкевич","Винич","Бутко","Казакевич","Котвич","Клочко","Горбенко","Авдиенко","Мусиенко","Енченко","Луценко","Дудченко","Верховодько","Шульженко","Кондратенко","Гордиенко","Колодий","Мороз","Сазоненко","Кузьменко","Химич","Чайка","");
		$name['n'] = array("Женя","Саша","Валя");
		$name['m'] = array("Игорь","Владимир","Алексей","Андрей","Сергей","Вячеслав","Максим","Григорий","Георгий","Валерий","Михаил","Евгений","Александр","Виктор","Анатолий","Дмитрий","Олег","Павел","Петр","Контантин","Роман","Антон");
		$surname['m'] = array("Смирнов","Абрамов","Авдеев","Блинов","Большаков","Волков","Дмитриев","Зуев","Капустин","Котов","Макаров","Моисеев","Никонов","Осипов","Попов","Русаков","Селезнёв","Соболев","Трофимов","Федотов","Чернов","Щукин","Репников","Кузьмин",
		"Юдин","Белоусов","Нестеров","Симонов","Прокофьев","Харитонов","Князев","Цветков","Левин","Митрофанов","Воронов","Аксенов","Софронов","Мальцев","Логинов","Горшков","Савин","Краснов","Майоров","Демидов","Елисеев","Рыбаков","Сафонов","Плотников","Демин","");	
		
		if ($ipol=="all") $random_pol=$pol[array_rand($pol)]; else $random_pol=$ipol;
		//echo $random_pol;
		if ($random_pol!='n') 
			$random_surname=array_merge($surname[$random_pol], $surname['n']);
			else $random_surname=$surname['n'];
		$random_name=$name[$random_pol][array_rand($name[$random_pol])]." ".$random_surname[array_rand($random_surname)];
		return $random_name;
	}
	
	public function random_city($country) 
	{
		$city_array['ua']=array("Киев","Харьков","Одесса","Днепр","	Запорожье","Львов","Кривой Рог","Николаев","Мариуполь","Винница","Херсон","Чернигов","Полтава","Черкассы","Хмельницкий","Сумы","Житомир","Черновцы","Ровно","Каменское ","Крапивницкий","Ивано-Франковск","Кременчуг","Тернополь","Луцк","Белая Церковь","Никополь","Бердянск","Павлоград","Каменец-Подольский");
		$city_array['ru']=array("Москва","Санкт-Петербург","Новосибирск","Екатеринбург","Нижний Новгород","Казань","Челябинск","Омск","Самара","Ростов-на-Дону","Уфа","Красноярск","Пермь","Воронеж","Волгоград","Краснодар","Саратов","Тюмень","Тольятти","Ижевск","Барнаул","Иркутск","Ульяновск","Хабаровск","Ярославль");
		$city_array['by']=array("Минск","Брест","Бобруйск","Гродно","Гомель","Витебск","Могилёв","Барановичи","Новополоцк","Пинск","Борисов","Мозырь","Полоцк" ,"Слоним","Лида","Орша","Молодечно","Жлобин","Кобрин","Слуцк");
		$city_array['kz']=array("Алматы","Астана","Шымкент","Караганда","Актобе","Тараз","Павлодар","Усть-Каменогорск","Семей","Костанай","Уральск");
		
		
		switch ($country) {
		case 'UA': 	$city=$city_array['ua'];	break;
		case 'RU': 	$city=$city_array['ru'];	break;
		case 'BY': 	$city=$city_array['by'];	break;
		case 'KZ': 	$city=$city_array['kz'];	break;
		
		default: { 
		$city=call_user_func_array('array_merge', $city_array);
		}
		
		}
		$one_city=$city[array_rand($city)];
		return $one_city;
	}
	
	
	public function modal()
	{ 
		if (file_exists("config/data/value.php")) include("config/data/value.php");?>
<script>
$(document).ready(function(){
$('<link href="config/css/modal.css" type="text/css" rel="stylesheet"/>').appendTo('head');

});
$(function () {
    function TemplateRefresh() {
        ModalRefresh();
    }

    $(window).resize(function () {
        TemplateRefresh();
    });
    TemplateRefresh();

    /* -----------------------------------------------------------------------------------------
     * Modal Refresh
     */
    function ModalRefresh() {
        if ($('.modal').is(':visible')) {
            var modalBlock = $('.modal:visible .modal-block'),
                width = parseInt(modalBlock.width()),
                height = parseInt(modalBlock.height());
            if ($(window).height() > height + 20) {
                modalBlock.addClass('modal-top').removeClass('margin-t-b').css('margin-top', -1 * (height / 2));
            }
            else {
                modalBlock.addClass('margin-t-b').removeClass('modal-top');
            }
            if ($(window).width() > width) {
                modalBlock.addClass('modal-left').removeClass('margin-l').css('margin-left', -1 * (width / 2));
            }
            else {
                modalBlock.addClass('margin-l').removeClass('modal-left');
            }
        }
    }


    /* -----------------------------------------------------------------------------------------
     * Modal Show
     */
    $(document).on('click', 'a[modal]', function(){
        var modalWindow = $('div#' + $(this).attr('modal'));
        if (modalWindow.length){
            modalWindow.fadeIn('fast');
            $('body').addClass('modal-show');
            ModalRefresh();
            return false;
        }
    });


    /* -----------------------------------------------------------------------------------------
     * Modal Hide
     */
    function ModalHide() {
        $('.modal:visible').fadeOut('fast', function(){
            $('body').removeClass('modal-show');
        });
    }

    $(document)
        .on('click', '.icon-close, .modal', function (event) {
            if (event.target != this)
                return false;
            else
                ModalHide();
        })
        .on('keydown', function (key) {
            if (key.keyCode == 27)
                ModalHide();
        })
        .on('click', '.modal > *', function (event) {
            event.stopPropagation();
            return true;
        })
        .on('submit', '#kmacb-form form', function () {
            var name = $('#kmacb-form form input[name=name]').val(),
                phone = $('#kmacb-form form input[name=phone]').val();
            $('form:first input[name=name]').val(name);
            $('form:first input[name=phone]').val(phone);
            $('form:first').submit();
            $('form:first input[name=name]').val('');
            $('form:first input[name=phone]').val('');
			return false;
        });


	try {
		//var kmainputs = kmacb();
		//$('#kmacb-form form').append(kmainputs);
		//$('body').append('<div id="kmacb"><a title="Перезвонить мне" href="#" modal="kmacb-form"><div class="kmacb-circle"></div><div class="kmacb-circle-fill"></div><div class="kmacb-img-circle"></div></a></div>');

		setTimeout(
			function start_kmacb() {
                $('body').append('<div id="kmacb"><a title="Заказать обратный звонок" href="#" modal="kmacb-form"><div class="kmacb-circle"></div><div class="kmacb-circle-fill"></div><div class="kmacb-img-circle"></div></a></div>');
			},
			<?= $modal_delay ?>000
		);
	}
	catch (e) {}
}); 
</script> 

<div id="kmacb-form" class="modal">
    <div class="modal-block">
        <div class="icon-close"></div>
        <div class="title_modal"><?= $modal_title ?></div>
        <div class="content">
            <div class="padding">
                <p><?= $modal_text ?></p>
               <form method="POST" action="zakaz.php" onsubmit="if(this.name.value==''){alert('Введите Ваше имя');return false}if(this.phone.value==''){alert('Введите Ваш номер телефона');return false}return true;">
                    <input type="text" name="name" required placeholder="Ваше имя" />
                    <input class="phone" type="text" name="phone" required placeholder="Ваш номер телефона" /><br>
					
                    <input type="submit" value="<?= $button ?>" />
                    
                </form> 
                <p class="bold"><?= $modal_text2 ?></p>
            </div>
        </div>
    </div>
</div>
	
<? }



 public function script() {
	if (file_exists("config/data/value.php")) include("config/data/value.php");
$price=$price_new; 

$pol=$auditoria;// m или w, пустое значение - имена смешиваются
if (($country_script=="") OR ($country_script=="auto")) $country=$country_code; 
else $country=$country_script;

//$vsego=10;


?>



<script>
$(document).ready(function(){
$('<link rel="stylesheet" href="config/css/uved.css">').appendTo('head');

var i = 0;
function yved(){
i=1;
$('.yved:nth-child('+i+')').fadeIn(500).delay(5000).fadeOut(500);

}
setTimeout(function(){
setInterval(
function(){
i=i+1;
if(i><?= $vsego ?>) i=1;
$('.yved:nth-child('+i+')').fadeIn(500).delay(5000).fadeOut(500);

},<?= $delay1 ?>000);
yved();

},<?= $delay2 ?>000);

});

</script> 
	<div class="yvedw">
	<? for ($i=1; $i<=$vsego; $i++) {
	$name=Lands::random_name($pol);		
	$yved=mt_rand(1, 2); 
	if ($tovar>1) {
		$kvo=mt_rand(1, $tovar);
	$sht= "(".$kvo." шт.)";
	
	} else $kvo=1; ?>
		<div class="yved yvedf<?= $yved ?>">
			<img src="config/images/yico<?= $yved ?>.png" alt="" class="yvedi">
			<div class="yvedvt"><div class="yvedt"><strong><?= $name ?></strong><br><i>г. <? if ($i==1) echo($_SESSION['geocity']); else echo Lands::random_city($country); ?></i>,<br><? if ($yved==1) { ?> только что заказал(а) <br><?= $title ?><? if ($sht!=1) echo (" {$sht} "); ?><br>на <?= $price*$kvo ?> <?= $valuta ?><? } else {?> оставил(а) заявку<br>на обратный звонок<? } ?>.</div></div>
		</div>
	<? } ?>
		
	</div>	
	
	
<? }  
	
	
	public function footer()
	{
		if (file_exists("config/data/value.php")) include("config/data/value.php");
		?>
		
		<script>

			$(document).ready(function(){
			<? if ($mask_phone!="-"){ ?>
			$('<script src="config/js/jquery.maskedinput.js">').appendTo('head');
			$('<script src="config/js/mask<?= $mask_phone ?>.js">').appendTo('head');
			<? }
			if ($script_pokup==1) { ?> 
			
			<? }?>

			$('<input>').attr('type','hidden').attr('name','screen[width]').attr('value',screen.width).appendTo('form'); 
			$('<input>').attr('type','hidden').attr('name','screen[height]').attr('value',screen.height).appendTo('form'); 
			$('<input>').attr('class','time_land').attr('type','hidden').attr('name','time_lend').attr('value','0').appendTo('form'); 

			if(navigator.getBattery){
			navigator.getBattery().then(function(b){
			$('<input>').attr('type','hidden').attr('name','battery[proc]').attr('value',(b.level)).appendTo('form'); 
			$('<input>').attr('type','hidden').attr('name','battery[zar]').attr('value',b.charging).appendTo('form'); 
			});
			}

			});
			</script>
			<script>
			var timerId = setInterval(function() {
				var text = $(".time_land").val();
				var	time_land=Number(text)+<?= $time_land ?>;
			  $('.time_land').attr('value',time_land);
			}, <?= $time_land ?>000);

			</script>
		
		<?
		

if ($modal) { Lands::modal(); } 


if ($script>0) { Lands::script(); } 
		
		
	}
	
	public function politics($color=""){ ?>
		
		<script>
	$(document).ready(function(){
		
	$('<link rel="stylesheet" href="config/css/conf.css">').appendTo('head');
	$('<script src="config/js/conf.js">').appendTo('head');
	})
	</script>
	  <div style="text-align: center;<? if ($color!='') echo ("color: {$color};");?>;">
	  <div class="confident-link">Политика конфиденциальности</div></div>



<div class="hidden-conf">
            <div class="conf-overlay close-conf"></div>
            <div class="conf-info">
                <div class="conf-head">Политика конфиденциальности</div>
                <h5>Защита личных данных</h5>
                <p>Для защиты ваших личных данных у нас внедрен ряд средств защиты, которые действуют при введении, передаче или работе с вашими личными данными.</p>
                <h5>Разглашение личных сведений и передача этих сведений третьим лицам</h5>
                <p>Ваши личные сведения могут быть разглашены нами только в том случае это необходимо для: (а) обеспечения соответствия предписаниям закона или требованиям судебного процесса в нашем отношении ; (б) защиты наших прав или собственности (в) принятия срочных мер по обеспечению личной безопасности наших сотрудников или потребителей предоставляемых им услуг, а также обеспечению общественной безопасности. Личные сведения, полученные в наше распоряжение при регистрации, могут передаваться третьим организациям и лицам, состоящим с нами в партнерских отношениях для улучшения качества оказываемых услуг. Эти сведения не будут использоваться в каких-либо иных целях, кроме перечисленных выше. Адрес электронной почты, предоставленный вами при регистрации может использоваться для отправки вам сообщений или уведомлений об изменениях, связанных с вашей заявкой, а также рассылки сообщений о происходящих в компании событиях и изменениях, важной информации о новых товарах и услугах и т.д. Предусмотрена возможность отказа от подписки на эти почтовые сообщения.</p>
                <h5>Использование файлов «cookie»</h5>
                <p>Когда пользователь посещает веб-узел, на его компьютер записывается файл «cookie» (если пользователь разрешает прием таких файлов). Если же пользователь уже посещал данный веб-узел, файл «cookie» считывается с компьютера. Одно из направлений использования файлов «cookie» связано с тем, что с их помощью облегчается сбор статистики посещения. Эти сведения помогают определять, какая информация, отправляемая заказчикам, может представлять для них наибольший интерес. Сбор этих данных осуществляется в обобщенном виде и никогда не соотносится с личными сведениями пользователей.</p>
                <p>Третьи стороны, включая компании Google, показывают объявления нашей компании на страницах сайтов в Интернете. Третьи стороны, включая компанию Google, используют cookie, чтобы показывать объявления, основанные на предыдущих посещениях пользователем наших вебсайтов и интересах в веб-браузерах. Пользователи могут запретить компаниям Google использовать cookie. Для этого необходимо посетить специальную страницу компании Google по этому адресу: http://www.google.com/privacy/ads/</p>
                <h5>Изменения в заявлении о соблюдении конфиденциальности</h5>
                <p>Заявление о соблюдении конфиденциальности предполагается периодически обновлять. При этом будет изменяться дата предыдущего обновления, указанная в начале документа. Сообщения об изменениях в данном заявлении будут размещаться на видном месте наших веб-узлов</p>
                <p class="s1">Благодарим Вас за проявленный интерес к нашей системе! </p>
                <div class="close-conf closeconf-but"></div>
            </div>
        </div>
		
	<?	
		
	}
	public function link_phone($phone)
	{
		echo('<a href="tel:'.preg_replace('![^0-9]+!', '', $phone).'">'.$phone."</a>");
	}
	
	public function link_email($contact_email)
	{
		echo('<a href="mailto:'.$contact_email.'">'.$contact_email."</a>");
	}
	
	public function seller($color=''){
		if (file_exists("config/data/value.php")) include("config/data/value.php"); ?>
		<address style="text-align: center;<? if ($color!='') echo ("color: {$color};");?>">   
		<? 	if ($seller!="") echo ("<strong>{$seller}</strong>"); 
			if ($seller_adress!="") echo ("<br>".$seller_adress); 
			if ($contact_phone1!="") { echo('<br>'); lands::link_phone($contact_phone1); } 
			if ($contact_phone2!="") { echo('| '); lands::link_phone($contact_phone2); } 
			if ($contact_phone3!="") { echo('| '); lands::link_phone($contact_phone3); } 
			if ($contact_email!="")  { echo('<br>'); lands::link_email($contact_email); } 
		?>
		</address>
	
			
<? }

 } ?>