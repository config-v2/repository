<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
     <title>Авторизация в конфигуратор v.<?= $config['ver']?> для <?= $_SERVER['SERVER_NAME']; ?></title>
<meta name="author" content="GreyGler" />
    <meta name="copyright" content="https://greygler.github.io" />
	 <link rel="shortcut icon" href="favicon.png" type="image/png">
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/spacelab/bootstrap.min.css" rel="stylesheet" integrity="sha384-L/tgI3wSsbb3f/nW9V6Yqlaw3Gj7mpE56LWrhew/c8MIhAYWZ/FNirA64AVkB5pI" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 
 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>body{padding-bottom:40px;background-color:#eee}.form-signin{max-width:330px;padding:15px;margin:0 auto}.form-signin .form-signin-heading,.form-signin .checkbox{margin-bottom:10px}.form-signin .checkbox{font-weight:400}.form-signin .form-control{position:relative;height:auto;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:10px;font-size:16px}.form-signin .form-control:focus{z-index:2}.form-signin input[type="email"]{margin-bottom:-1px;border-bottom-right-radius:0;border-bottom-left-radius:0}.form-signin input[type="password"]{margin-bottom:10px;border-top-left-radius:0;border-top-right-radius:0}</style>
  </head>

  <body style="margin-top: 0px;">

    <div class="container">
	<div class="page-header text-center">
  <h1><strong>Конфигуратор v. <?= $config['ver'];?></strong><br><small><img src="https://www.google.com/s2/favicons?domain=<?= $_SERVER['SERVER_NAME'] ?>"> <a title="Перейти к сайту" href="<?= $scheme.'://'.$_SERVER['SERVER_NAME'].str_ireplace('/config/index.php','', $_SERVER['PHP_SELF']); ?>"><?= $scheme.'://'.$_SERVER['SERVER_NAME'].str_ireplace('/config/index.php','', $_SERVER['PHP_SELF']); ?></a></small></h1>
</div>

      <form class="form-signin" role="form" action="options/autoring.php" method="POST">
        <h3 class="form-signin-heading">Авторизация
		<? if (($_SESSION['login']!="") AND ($_SESSION['password'])!=""){ ?>: <small style="color: red"> Ошибка!</small><? } ?></h3>
		<? if (($_SESSION['login']!="") AND ($_SESSION['password'])!=""){ ?><div class="wow shake"><? } ?>
		<div class="form-group">
        <input type="text" class="form-control" placeholder="login" name="login" required autofocus>
		</div>
		<div class="form-group">
        <input type="password" class="form-control" placeholder="password" name="password" required>
		</div>
        <? if (($_SESSION['login']!="") AND ($_SESSION['password'])!=""){ ?></div>
		 <p class="form-control-static text-center" style="color: red">Неправильный логин или пароль</p>
		
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
		<script>wow = new WOW(); wow.init();</script><? } ?> 
        <button class="btn btn-lg btn-primary btn-block" type="submit">Авторизоваться</button>
      </form>


    </div>
	<div class="navbar navbar-default navbar-fixed-bottom footer" role="navigation">
     <div class="container">
    
     <a title="Официальный сайт Конфигуратора" class="navbar-brand footer" href="<?= $config['site_conf'] ?>">&copy; 2015-<?= date("Y")?> Конфигуратор для лендингов v.<?= $config['ver']?></a>
   
		
		<ul class="nav navbar-nav navbar-right">
      <li><a title="Разработчик" href="<?= $config['site_gg'] ?>"><?= $config['powered'] ?></a></li>
      
     </ul>
    
   </div>
  </div>
  
  </body>
</html>
