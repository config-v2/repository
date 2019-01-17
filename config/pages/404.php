<?php  require_once('config/data/array.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>404</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
<style type="text/css">
body{
	font-family: 'Pangolin', cursive;
}
body{
	background:#DAD6CC;
}	
.wrap{
	width:100%;
	margin-top:100px;
}
.logo h1{
	font-size:12em;
	color:#FF7A00;
	text-align:center;
	margin:40px 0 0 0;
	text-shadow:4px 4px 1px white;
}	
.logo p{
	color:#B1A18D;
	font-size:2em;
	margin-top:1px;
	text-align:center;
}	
.logo p span{
	color:lightgreen;
}	
.sub a{
	color:#ff7a00;
	text-decoration:none;
	padding:5px;
	font-size:1em;
	font-family: arial, serif;
	font-weight:bold;
}	
.footer{
	color:white;
	position:absolute;
	right:10px;
	bottom:1px;
}	
.footer a{
	color:#ff7a00;
}	
</style>
</head>



<body>
<!---320x50--->
	<div class="wrap">
		<div class="logo">
			<h1>404</h1>
			<p> Страница не найдена!</p>
			<!---320x50--->
			<div class="sub">
				<p><a href="/"> Вернуться к сайту</a></p>
			</div>
		</div>
	</div>	
	<!---320x50---> 
	<div class="footer">  
	 &copy; 2015-<?php echo  date("Y")?> | Конфигуратор для лендингов <a target="_blank" href="<?php echo  $config['site_conf'] ?>">Config v.<?php echo  $config['ver']?></a>
	</div>

</body>