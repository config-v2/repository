<? 
session_start();
require_once('data/logins.php');
if (isset($_SERVER['HTTPS'])) $scheme = $_SERVER['HTTPS']; else $scheme = '';
if (($scheme) && ($scheme != 'off')) $scheme = 'https'; else $scheme = 'http';
$host_path=str_ireplace('index.php','', $_SERVER['PHP_SELF']);
$host=$_SERVER['HTTP_HOST'].$host_path;
$server="{$scheme}://{$host}";
//print_r($_SESSION);
if (($_SESSION['login']==$login) AND ($_SESSION['password'])==$password) {
require_once('data/array.php');

$filename = "data/value.php";

if (file_exists($filename)) include ($filename);

 ?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Конфигуратор v.<?= $config['ver']?> для <?= $_SERVER['SERVER_NAME']; ?></title>
  <meta name="author" content="GreyGler" />
    <meta name="copyright" content="https://greygler.github.io" />
	 <link rel="shortcut icon" href="favicon.png" type="image/png">
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/spacelab/bootstrap.min.css" rel="stylesheet" integrity="sha384-L/tgI3wSsbb3f/nW9V6Yqlaw3Gj7mpE56LWrhew/c8MIhAYWZ/FNirA64AVkB5pI" crossorigin="anonymous">
   <link href="css/style.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/codemirror.css" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/codemirror.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/mode/xml/xml.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/mode/htmlmixed/htmlmixed.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/edit/matchbrackets.js"></script>
	<script type="text/javascript" id="widget-wfp-script" src="https://secure.wayforpay.com/server/pay-widget.js?ref=button"></script> 
	<script type="text/javascript">function runWfpWdgt() {var wayforpay = new Wayforpay(); wayforpay.invoice('https://secure.wayforpay.com/button/b44c537ac9673');}</script>
	<script type="text/javascript" language="javascript">
 	function pass() {
 	  var msg   = $('#pass_form').serialize();
        $.ajax({
          type: 'POST',
          url: 'options/password_save.php',
          data: msg,
          success: function(data) {
			$('#pass_block').addClass('hidden');
			$('#no').addClass('hidden');
			$('#ok').removeClass('hidden');
            $('#results').html(data);
            $('#success').addClass('hidden');
         
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
 
    }
	</script>
	<script type="text/javascript" language="javascript">
	 	function clearfunc() {
 	  var msg   = $('#clear_form').serialize();
        $.ajax({
          type: 'POST',
          url: 'options/clear.php',
          data: msg,
          success: function(data) {
			$('#clear_block').addClass('hidden');
			$('#no-clear').addClass('hidden');
			$('#ok-clear').removeClass('hidden');
            $('#results-clear').html(data);
            $('#suc-clear').addClass('hidden');
         
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
 
    }
</script>

	  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
	<style>
 .CodeMirror { height: auto; border: 1px solid #ddd; }
 .CodeMirror-scroll { max-height: 200px; }
 .CodeMirror pre { padding-left: 7px; line-height: 1.25; }
</style>
 </head>
 <body>
 
 
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
   <div class="container">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Меню</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand" href="/config"><strong>Конфигуратор</strong> v.<?= $config['ver']?> </a>
    </div>
    <div class="navbar-collapse collapse">
     
     <ul class="nav navbar-nav navbar-right">
      <li><a data-toggle="modal" data-target="#pass" href="#">Сменить пароль</a></li>
	    <li ><a data-toggle="modal" data-target="#clear" href="#">Очистить настройки</a></a></li>
      <li <? if ($_GET['page']=="help") echo('class="active"'); ?>><a  href="?page=help">Помощь</a></li>
		<li> <a href="#" onclick="runWfpWdgt();">Поддержать проект</a></li>
      <li class="active"><a data-toggle="modal" data-target="#exit" href="#"><i class="fa fa-power-off" aria-hidden="true"></i> Выход</a></a></li>
     </ul>
    </div><!--/.nav-collapse -->
   </div>
  </div>
  
   <div class="container">
<? if ($password==md5('admin')) { ?>

  	<div class="alert alert-danger alert-dismissable text-center">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 <a href="#" class="alert-link "><strong>Внимание!</strong> В целях безопасности поменяйте пароль для входа в админ-панель конфигуратора</a>
</div>
<? } ?>
 
 <? if ($_GET['page']!="") $page='pages/'.$_GET['page'].".php"; else $page='pages/config.php';
 
 
 include($page); ?>
 
 </div>

<div class="navbar navbar-default navbar-fixed-bottom footer" role="navigation">
   <div class="container">
    
     <a class="navbar-brand footer" href="<?= $config['site_conf'] ?>">&copy; 2015-<?= date("Y")?> Конфигуратор для лендингов v.<?= $config['ver']?></a>
   
		
		<ul class="nav navbar-nav navbar-right">
      <li><a href="<?= $config['site_gg'] ?>"><?= $config['powered'] ?></a></li>
      
     </ul>
    
   </div>
  </div>
  
    <div class="modal fade" id="clear" tabindex="-1" role="dialog" aria-labelledby="bodyclear" aria-hidden="true">
 <div class="modal-dialog ">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="bodyclear">Сброс всех настроек</h4>
   </div>
   <form id="clear_form" class="form-horizontal" action="javascript:void(null);" onsubmit="clearfunc()" method="post" role="form">
   <div class="modal-body text-center">
   <div id="clear_block">
   <h3 style="color: red"><strong >ВНИМАНИЕ!</strong><br><small style="color: red">После очистки даных все Ваши настройки будут удалены!</small></h3>
     
   <p><strong>Для продолжения введите пароль</strong></p>
  
    
  <div class="form-group">
    <label for="pass_new" class="col-sm-4 control-label">Пароль:</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="pass_clear" name="password" placeholder="Пароль от конфигуратора">
    </div>
	
  </div>
      
	  </div>
	  <div  style="color: red" id="results-clear"></div>
	  
      </div>
      
   
   <div class="modal-footer">
        <button id="no-clear" type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button id="suc-clear" type="submit" class="btn btn-danger">Очистить данные</button>
        <a id="ok-clear" href="<?= $server ?>" class="btn btn-primary hidden">Ok</a>
      </div>
	  </form>
  </div>
 </div>
</div>

  <div class="modal fade" id="exit" tabindex="-1" role="dialog" aria-labelledby="exbody" aria-hidden="true">
 <div class="modal-dialog modal-sm">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="exbody">Выход</h4>
   </div>
   <div class="modal-body">
    Хотите закончить работу с конфигуратором?
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
    <a href="options/exit.php" type="button" class="btn btn-primary">Да, Выйти</a>
   </div>
  </div>
 </div>
</div>

 

<div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="passbody" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="passbody">Сменить пароль</h4>
      </div>
	  
	   <form id="pass_form" class="form-horizontal" action="javascript:void(null);" onsubmit="pass()" method="post" role="form">
      <div class="modal-body">
       <div  id="pass_block">
  <div class="form-group">
    <label for="login" class="col-sm-4 control-label">Логин:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="login" value="<?= $login ?>" name="login" placeholder="Логин">
    </div>
  </div>
  <div class="form-group">
    <label for="pass_old" class="col-sm-4 control-label">Старый пароль:</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="pass_old" name="pass_old" placeholder="Старый пароль">
    </div>
  </div>
  <div class="form-group">
    <label for="pass_new" class="col-sm-4 control-label">Новый пароль:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="pass_new" name="password" placeholder="Новый пароль">
    </div>
	
  </div>
  


      </div>
	  
	  <div id="results"></div>
	  
      </div>
      <div class="modal-footer">
        <button id="no" type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button id="success" type="submit" class="btn btn-primary">Сменить пароль</button>
        <a id="ok" href="<?= $server ?>" class="btn btn-primary hidden">Ok</a>
      </div>
	  </form>
    </div>
  </div>
</div>

	
	 
 </body>
</html>
<? }  else header('location: signin.php');