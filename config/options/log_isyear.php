 <?php  require_once('../class/functions.class.php'); ?> 
  <option selected disabled value="">Укажите</option> 
 <?php  foreach (scandir('../logs/'.$_POST['y']) as $key=>$value) if (($value!=".") AND ($value!="..")) { ?>
	<option   value="<?php echo  $value ?>"><?php echo  config::month_rus((int)$value,false) ?></option>
	 <?php  } ?> 