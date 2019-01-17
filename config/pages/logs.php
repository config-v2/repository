<div class="page-header">
<h2>Журнал заявок</h2>
</div>


<div class="panel panel-default">
  <div class="panel-body">
<div class="form-group"> 
 <label for="year" class="col-sm-1 control-label">Год:</label>
    <div class="col-sm-2">
	<select class="form-control" name="year" id="year" onchange="isyear(this.value)"> 
	<!-- <option selected disabled value="">Укажите</option> -->
	<?php  $dir='logs/'; 
	
	foreach (scandir($dir) as $key=>$value) if (stripos($value, '.')===false) { ?>
	<option  <?php  if ($value==date("Y")) echo("selected"); ?> value="<?php echo  $value ?>"><?php  if ($value==date("Y")) echo("✔"); ?>&nbsp;<?php echo  $value ?></option>
	<?php  } ?>
	
	</select>
      
    </div>
	 <label for="month" class="col-sm-1 control-label">Месяц:</label>
    <div class="col-sm-2">
	<select class="form-control" name="month" id="month" onchange="ismonth(this.value)"> 
	 <?php  foreach (scandir($dir.date("Y")) as $key=>$value) if (($value!=".") AND ($value!="..")) { ?>
	<option  <?php  if ($value==date("m")) echo("selected"); ?> value="<?php echo  $value ?>"><?php  if ($value==date("m")) echo("✔"); ?>&nbsp;<?php echo  config::month_rus((int)$value,false)?></option>
	 <?php  } ?>
	</select>
      
    </div>
	
	 <label for="day" class="col-sm-1 control-label">День:</label>
    <div class="col-sm-2">
	<select class="form-control" name="day" id="day" onchange="isday(this.value)"> 
	<?php  foreach (scandir($dir.date("Y").'/'.date("m")) as $key=>$value) if (($value!=".") AND ($value!="..")) {
		$day=str_replace('.php', '', $value );		?>
	<option  <?php  if ($day==date("d")) echo("selected"); ?> value="<?php echo  $day ?>"><?php  if ($day==date("d")) echo("✔"); ?>&nbsp;<?php echo  $day ?></option>
	 <?php  } ?>
	</select>
      
    </div>
	<?php  $today_log='logs/'.date("Y/m/d").'.php'; $ytoday_log='logs/'.date("Y/m/d", time() - 86400).'.php'; $pytoday_log='logs/'.date("Y/m/d", time() - 86400*2).'.php'; ?>
<div id="del" class="col-sm-1 <?php  if (!file_exists($today_log)) echo('hidden') ?>"><a onclick="dmodal()" data-toggle="modal" data-target="#del_modal" class="btn btn-danger" href="#">Удалить Журнал за <span class="del_day"><?php echo  date('d'); ?></span>.<span class="del_month"><?php echo  date('m')?></span>.<span class="del_year"><?php echo  date("Y") ?></span></a></div>
</div> </div></div>
<ul class="pager">
  <?php  if (file_exists($pytoday_log))  { ?><li><a onclick="datelog(<?php echo  date("d,m,Y", time() - 86400*2); ?>); return false;" href="#">Позавчера (<?php echo date('d.m.Y', time() - 86400*2); ?>)</a></li><?php  } ?>
 <?php  if (file_exists($ytoday_log))  { ?><li><a onclick="datelog(<?php echo  date("d,m,Y", time() - 86400); ?>); return false;" href="#">Вчера (<?php echo date('d.m.Y', time() - 86400); ?>)</a></li><?php  } ?>
 <?php  if (file_exists($today_log))  { ?><li><a onclick="datelog(<?php echo  date("d,m,Y") ?>); return false;" href="#">Сегодня (<?php echo  date('d.m.Y') ?>)</a></li><?php  } ?>
</ul> 

<table class="table"> 
<thead> 
<tr> 
<th>Дата заказа</th>
<th>Покупатель</th>
<th>Цена</th>
<th>UTM-метки</th>
</tr>
</thead>
<tbody id="logs"> 
<?php   if (file_exists($today_log))  {require_once($today_log); echo htmlspecialchars_decode($log);}
else echo('<tr><td colspan="5" ><h3>Журнал заявок за сегодня отсутствует.</h3></td></td>') ?>
</tbody>

</table>

  <div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="bodydel" aria-hidden="true">
 <div class="modal-dialog ">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="bodydel">Удаление Журнала за <strong><span class="del_day"><?php echo  date('d'); ?></span>.<span class="del_month"><?php echo  date('m')?></span>.<span class="del_year"><?php echo  date("Y") ?></span></strong></h4>
   </div>
   <form id="del_form" class="form-horizontal" action="javascript:void(null);" onsubmit="delfunc()" method="post" role="form">
   <div class="modal-body text-center">
   <div id="del_block">
   <h3 style="color: red"><strong >ВНИМАНИЕ!</strong><br><small style="color: red">Журнал заявок за <strong><span class="del_day"><?php echo  date('d'); ?></span>.<span class="del_month"><?php echo  date('m')?></span>.<span class="del_year"><?php echo  date("Y") ?></span></strong> будет удален безвозвратно!</small></h3>
     
   <p><strong>Для продолжения введите пароль</strong></p>
  
    
  <div class="form-group">
    <label for="pass_new" class="col-sm-4 control-label">Пароль:</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="pass_del" name="password" placeholder="Пароль от <?php echo  $config['name'] ?>а">
    </div>
	
  </div>
      
	  </div>
	  <div  style="color: red" id="results-del"></div>
	  
      </div>
      
   <input id="dm" type="hidden" name="m" value="<?php echo  date('m')?>">
   <input id="dy" type="hidden" name="y" value="<?php echo  date("Y") ?>">
   <input id="dd" type="hidden" name="d" value="<?php echo  date('d'); ?>">
   <div class="modal-footer">
        <button id="no-del" type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button id="suc-del" type="submit" class="btn btn-danger">Удалить Журнал заявок</button>
       </div>
	  </form>
  </div>
 </div>
</div>

<script> 
function isyear(y){
	  $.ajax({
        type: 'POST',
         url: 'options/log_isyear.php',
      data: {y},
        success: function(data) {
           $('#month').html(data);
		   $('#day').html('<option selected disabled value="">Укажите</option>');
		     $('#logs').html('<tr><td colspan="5" ><h3>Жду месяц и число...</h3></td></td>');
			  $('.del_year').html(y);
			  $('#dy').prop('value',y);
			  $('#del').addClass('hidden');
        },
         error:  function(xhr, str){
   alert('Возникла ошибка: ' + xhr.responseCode);
        }
      });
}

function ismonth(m){
	var y=$('#year').val();
	
	  $.ajax({
        type: 'POST',
         url: 'options/log_ismonth.php',
      data: {y,m},
        success: function(data) {
           $('#day').html(data);
		     $('#logs').html('<tr><td colspan="5" ><h3>Жду число...</h3></td></td>');
			 $('.del_month').html(m);
			 $('#dm').prop('value',m);
			 $('#del').addClass('hidden');
        },
         error:  function(xhr, str){
   alert('Возникла ошибка: ' + xhr.responseCode);
        }
      });
}

function isday(d){
	var df=d+'.php';
	 var y=$('#year').val();
	 var m=$('#month').val();
	 var f=y+'/'+m+'/'+df;
      $.ajax({
        type: 'POST',
         url: 'options/log_isday.php',
      data: {f},
        success: function(data) {
           $('#logs').html(data);
		   $('.del_day').html(d);
		   $('#dd').prop('value',d);
		   $('#del').removeClass('hidden');
        },
         error:  function(xhr, str){
   alert('Возникла ошибка: ' + xhr.responseCode);
        }
      }); 
 
    }
	function datelog(d,m,y){
		if (d<10) d='0'+d;
	var df=d+'.php';
	 var f=y+'/'+m+'/'+df;
	   $.ajax({
        type: 'POST',
         url: 'options/log_isday.php',
      data: {f},
        success: function(data) {
           $('#logs').html(data);
		   $('.del_day').html(d);
		    $('.del_month').html(m);
			$('.del_year').html(y);
		   $('#dd').prop('value',d);
		    $('#dm').prop('value',m);
			$('#dy').prop('value',y);
			$('#year option[value="'+y+'"]').prop('selected', true);
			$('#month option[value="'+m+'"]').prop('selected', true);
			$('#day option[value="'+d+'"]').prop('selected', true);
		   $('#del').removeClass('hidden');
        },
         error:  function(xhr, str){
   alert('Возникла ошибка: ' + xhr.responseCode);
        }
      }); 
 
    }
	
	
	function dmodal(){
			$('#suc-del').removeClass('hidden');
			$('#pass_del').prop('value','');
			$('#results-del').html('');
			 $('#del_block').removeClass('hidden');
			$('#suc-del').removeClass('hidden');
		   $('#no-del').html('Отмена');
	}
	
	function delfunc(){
		 var msg   = $('#del_form').serialize();
		  $.ajax({
        type: 'POST',
         url: 'options/log_del.php',
        data: msg,
        success: function(data) {
		
           $('#logs').html('<tr><td colspan="5" ><h3>Жду число...</h3></td></td>');
		   $('#del').addClass('hidden');
		   $('#del_block').addClass('hidden');
		   $('#suc-del').addClass('hidden');
		   $('#no-del').html('Ok');
		   $('#results-del').html(data);
		    ismonth($('#month').val());
        },
         error:  function(xhr, str){
   alert('Возникла ошибка: ' + xhr.responseCode);
        }
      }); 
		
	}


</script>