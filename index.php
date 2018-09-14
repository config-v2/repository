<? require_once('config.php'); //  Подключаем конфигуратор ?>
<!DOCTYPE html>

	<head>
		<meta charset="UTF-8">
		<title>Демонстрация возможностей Конфигуратора v.2.1</title>
		<meta http-equiv="content-type" content="text/html; utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="GreyGler" />
		<meta name="copyright" content="https://greygler.github.io" />
		<link rel="shortcut icon" href="favicon.png" type="image/png">
		<meta name="keywords" content="Ключевые слова">
		<meta name="description" content="Описание демонстрационного ленда">
		<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/spacelab/bootstrap.min.css" rel="stylesheet" integrity="sha384-L/tgI3wSsbb3f/nW9V6Yqlaw3Gj7mpE56LWrhew/c8MIhAYWZ/FNirA64AVkB5pI" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
		body {margin-bottom: 40px;}
			.thumb-wrap {
				position: relative;
				padding-bottom: 56.25%; 
				padding-top: 30px;
				height: 0;
				overflow: hidden;
			}
			.thumb-wrap iframe {
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
			}
			.phone {float: right !important; }
			.email {float: right !important; padding-left: 10px; }
			.review {padding: 20px; margin: 20px}
		</style>
		<? lands::head($head_index64); // Код для блока HEAD ?>
	</head>
	<body>
		<? lands::body($body_index64); // Код для блока BODY ?>
		<div class="container"> 
			<div class="page-header">
				<h1 class="text-center"><strong>ДЕМОНСТРАЦИЯ ВОЗМОЖНОСТЕЙ</strong><small><br>Конфигуратор v.2.1</small></h1>
				<div class="text-center"><a href="/config" target="_blank" >Посмотреть конфигуратор</a></div>
			</div>
			<span class="visible-md visible-lg">
				<span class="phone"><strong>Звоните:</strong> <? lands::link_phone($contact_phone1); // Активная ссылка на телефон ?></span>
				<span class="email"><strong>Пишите:</strong> <? lands::link_email($contact_email); // Активная ссылка на почту ?>
				<strong>&nbsp;|&nbsp;</strong></span>
			</span>
			<span class="visible-xs visible-sm">
				<strong>Пишите:</strong> <? lands::link_email($contact_email); // Активная ссылка на почту ?>
				<br>
				<strong>Звоните:</strong> <? lands::link_phone($contact_phone1); // Активная ссылка на телефон ?>
			</span>
			<div class="row">
				<div class="col-md-7 col-lg-7 thumbnail"> 
					<h3>
						Видеообзор устаревшей версии 1.9:
					</h3>
					<div class="thumb-wrap">
						<iframe width="854" height="480" src="https://www.youtube.com/embed/I56D87MHQnI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					</div>
					<h3>
						Как Вы раньше обходились без конфигуратора?
					</h3>
				</div>
				<div class="col-md-5 col-lg-5">
					<div class="jumbotron">
						<h2 class="text-center">
							<strong>
								Суперцена: <?= $price_new; // Новая цена ?> <?= $valuta; // Валюта?>
							</strong>
						</h2>
						<h3 class="text-center">
							<small>
								Старая цена: 
							</small>
							<s>
								<small>
									<?= $price_old; // Старая цена ?> <?= $valuta; // Валюта ?>
								</small>
							</s>
						</h3>
						<h4 class="text-center">
							Скидка: 
							<strong>
								<span class="label label-info">
									<?= $skidka; // Скидка ?>%
								<span>
							</strong>
						</h4>
					</div>
					<form id="mform" class="form-horizontal thumbnail" role="form" action="zakaz.php" method="post" onsubmit="if(this.name.value==''){alert('Введите Ваше имя!');return false}if(this.phone.value==''){alert('Введите Ваш номер телефона!');return false}return true;"> 
						<legend>Оставьте заявку</legend>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">ФИО:</label>
								<div class="col-sm-10">
									<input type="text" name="name" required class="form-control" placeholder="Имя">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Телефон:</label>
								<div class="col-sm-10">
									<input type="text" name="phone" class="form-control" required placeholder="Телефон">
								</div>
							</div>
						
							<div class="form-group text-center">		
								<input class="btn btn-primary" type="submit" value="Отправить">
							</div>	
							<? lands::form('Главная форма'); // Имя формы с заказом ?>
					</form>
					<span class="help-block text-center">Мы не рассылаем спам и не передаем данные третьим лицам.</span>
				</div>
				
			</div>

			<h2>Отзывы:</h2>	
			
			<div class="review_slide">
			<div>
				<div class="thumbnail review">
					
					<blockquote class="blockquote-reverse">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, error, eum, sed consequuntur similique repudiandae harum molestiae reprehenderit dolores explicabo tempore sit sunt voluptatem velit rem veniam quasi alias culpa!</p>
							<footer><?= lands::random_name('w'); // Случайное женское имя ?>, <cite title="Source Title">г. <?= $geocity; // Город пользователя ?></cite></footer>
					</blockquote>
					
				</div>
			</div>
			<div>
				<div class="thumbnail review">
					<blockquote class="blockquote-reverse">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, in, harum temporibus esse odit ex cupiditate quo a et tempore modi quaerat officia est eos distinctio officiis hic! Veritatis, vitae.
					</p>
							<footer><?= lands::random_name('n'); // Случайное нейтральное имя ?>, <cite title="Source Title">г. <?= lands::random_city($country_script); // Случайный город по ГЕО ?></cite></footer>
					</blockquote>
					
				</div>
			</div>
			<div>
				<div class="thumbnail review">
								
					<blockquote class="blockquote-reverse">
						<p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, doloremque, exercitationem dolorem modi eum consequuntur repellat sed porro officiis nesciunt quasi autem qui accusantium quos perferendis. Eveniet quisquam consectetur dolor?
					</p>
							<footer><?= lands::random_name('m'); // Случайное мужское имя ?>, <cite title="Source Title">г. <?= lands::random_city($country_script); // Случайный город по ГЕО ?></cite></footer>
					</blockquote>
				</div>
			</div>
			</div>		
			<div id="footer">
				<div class="footer_text">
					<? lands::seller('blue'); // Данные о продавце ?>
					<br>
					<? lands::politics('red'); // Политика конфиденциальности ?>
				</div>
			</div>
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
		<script>
		$(document).ready(function(){
			$('.review_slide').slick({
			  dots: true,
			  infinite: true,
			  speed: 300,
			  slidesToShow: 1,
			  adaptiveHeight: true,
			   autoplay: true,
			autoplaySpeed: 3000,
			});
		});
		
		</script>
	<?  lands::footer(); // Дополнительная часть скриптов, ставим перед </body> ?>
	</body>
</html>
