   <option selected disabled value="">Укажите</option> 
 <? foreach (scandir('../logs/'.$_POST['y'].'/'.$_POST['m']) as $key=>$value) if (($value!=".") AND ($value!="..")) {
		$day=str_replace('.php', '', $value );		?>
	<option   value="<?= $day ?>"><?= $day ?></option>
	 <? } ?> 