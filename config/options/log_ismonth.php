   <option selected disabled value="">Укажите</option> 
 <?php  foreach (scandir('../logs/'.$_POST['y'].'/'.$_POST['m']) as $key=>$value) if (($value!=".") AND ($value!="..")) {
		$day=str_replace('.php', '', $value );		?>
	<option   value="<?php echo  $day ?>"><?php echo  $day ?></option>
	 <?php  } ?> 