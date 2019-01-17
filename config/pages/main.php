<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo  $config['name'] ?> v.<?php echo  $config['ver']?> для <?php echo  $_SERVER['SERVER_NAME']; ?></title>
  <meta name="author" content="GreyGler" />
    <meta name="copyright" content="https://greygler.github.io" />
	 <link rel="shortcut icon" href="favicon.png" type="image/png">
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/spacelab/bootstrap.min.css" rel="stylesheet" integrity="sha384-L/tgI3wSsbb3f/nW9V6Yqlaw3Gj7mpE56LWrhew/c8MIhAYWZ/FNirA64AVkB5pI" crossorigin="anonymous">
   <link href="css/style.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/codemirror.css" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <!--
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/codemirror.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/mode/xml/xml.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/mode/htmlmixed/htmlmixed.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/edit/matchbrackets.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.3/tinymce.min.js"></script>
	<script type="text/javascript" id="widget-wfp-script" src="https://secure.wayforpay.com/server/pay-widget.js?ref=button"></script> 
	<script type="text/javascript">function runWfpWdgt(){(new Wayforpay).invoice("https://secure.wayforpay.com/button/b44c537ac9673")}function pass(){var s=$("#pass_form").serialize();$.ajax({type:"POST",url:"options/password_save.php",data:s,success:function(s){$("#pass_block").addClass("hidden"),$("#no").addClass("hidden"),$("#ok").removeClass("hidden"),$("#results").html(s),$("#success").addClass("hidden")},error:function(s,a){alert("Возникла ошибка: "+s.responseCode)}})}function clearfunc(){var s=$("#clear_form").serialize();$.ajax({type:"POST",url:"options/clear.php",data:s,success:function(s){$("#clear_block").addClass("hidden"),$("#no-clear").addClass("hidden"),$("#ok-clear").removeClass("hidden"),$("#results-clear").html(s),$("#suc-clear").addClass("hidden")},error:function(s,a){alert("Возникла ошибка: "+s.responseCode)}})}</script>
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
 .video-container {
				margin: -1px auto 0;
				width: 480px;
				height: 270px;
				background-color: #000;
				overflow: hidden;
				position: relative;
			}
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
     <a class="navbar-brand" href="?p=main"><strong><?php echo  $config['name'] ?></strong> v.<?php echo  $config['ver']?> </a>
    </div>
    <div class="navbar-collapse collapse">
     
     <ul class="nav navbar-nav navbar-right">
      <li><a  href="?p=main"><?php echo  $config['menu_name']['main'] ?></a></li>
      <li <?php  if ($_GET['page']=="logs") echo('class="active"'); ?> id="lilog" class="<?php  if ($logs!='1') echo('hidden')?>"><a  href="<?php echo  $config['menu_link']['log'] ?>"><?php echo  $config['menu_name']['log'] ?></a></li>
      <li ><a data-toggle="modal" data-target="#pass" href="<?php echo  $config['menu_link']['pass'] ?>"><?php echo  $config['menu_name']['pass'] ?></a></li>
	    <li ><a data-toggle="modal" data-target="#clear" href="<?php echo  $config['menu_link']['clear'] ?>"><?php echo  $config['menu_name']['clear'] ?></a></a></li>
      <li <?php  if ($_GET['page']=="help") echo('class="active"'); ?>><a  href="<?php echo  $config['menu_link']['help'] ?>"><?php echo  $config['menu_name']['help'] ?></a></li>
		<li> <a href="<?php echo  $config['menu_link']['don'] ?>" onclick="runWfpWdgt();"><?php echo  $config['menu_name']['don'] ?></a></li>
      <li class="active"><a data-toggle="modal" data-target="#exit" href="<?php echo  $config['menu_link']['exit'] ?>"><i class="fa fa-power-off" aria-hidden="true"></i> <?php echo  $config['menu_name']['exit'] ?></a></li>
     </ul>
    </div><!--/.nav-collapse -->
   </div>
  </div>

   <div class="container">
<?php  if ($password==md5('admin')) { ?>

  	<div class="alert alert-danger alert-dismissable text-center">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 <a href="#" class="alert-link "><strong>Внимание!</strong> В целях безопасности поменяйте пароль для входа в админ-панель <?php echo  $config['name'] ?>а</a>
</div>
<?php  } ?>
 
 <?php  if ($_GET['page']!="") $page='pages/'.$_GET['page'].".php"; else $page='pages/config.php';
 
 
 include($page); ?>
 
 </div>

<div class="navbar navbar-default navbar-fixed-bottom footer" role="navigation">
   <div class="container">
    
     <a class="navbar-brand footer" href="<?php echo  $config['site_conf'] ?>">&copy; 2015-<?php echo  date("Y")?> <?php echo  $config['name'] ?> для лендингов v.<?php echo  $config['ver']?></a>
   
		
		<ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo  $config['site_gg'] ?>"><?php echo  $config['powered'] ?></a></li>
      
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
      <input type="password" class="form-control" id="pass_clear" name="password" placeholder="Пароль от <?php echo  $config['name'] ?>а">
    </div>
	
  </div>
      
	  </div>
	  <div  style="color: red" id="results-clear"></div>
	  
      </div>
      
   
   <div class="modal-footer">
        <button id="no-clear" type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button id="suc-clear" type="submit" class="btn btn-danger">Очистить данные</button>
        <a id="ok-clear" href="<?php echo  $server ?>" class="btn btn-primary hidden">Ok</a>
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
    Хотите закончить работу с <?php echo  $config['name'] ?>ом?
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
      <input type="text" class="form-control" id="login" value="<?php echo  $login ?>" name="login" placeholder="Логин">
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
        <a id="ok" href="<?php echo  $server ?>" class="btn btn-primary hidden">Ok</a>
      </div>
	  </form>
    </div>
  </div>
</div>
<link href="css/youtube_wrapper.css" rel="stylesheet">
		<script src="js/youtube_wrapper.js"></script>

	<script> 
	tinymce.init({
  selector: '#message',
  height: 300,
  menubar: false,
  
  plugins: [
    'advlist autolink lists link charmap  preview textcolor',
    'visualblocks code fullscreen',
    'table contextmenu paste help wordcount'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist | table | removeformat | code | help',
 
});

	tinymce.init({
  selector: '#polit',
  height: 300,
  menubar: false,
  
  plugins: [
    'advlist autolink lists link charmap  preview textcolor',
    'visualblocks code fullscreen',
    'table contextmenu paste help wordcount'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist | table | removeformat | code | help',
 
});
	
	</script>
	 
 </body>
</html>