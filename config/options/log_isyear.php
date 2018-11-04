 <? require_once('../class/functions.class.php'); ?> 
  <option selected disabled value="">Укажите</option> 
 <? foreach (scandir('../logs/'.$_POST['y']) as $key=>$value) if (($value!=".") AND ($value!="..")) { ?>
	<option   value="<?= $value ?>"><?= config::month_rus((int)$value,false) ?></option>
	 <? } ?> 