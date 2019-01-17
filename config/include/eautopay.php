<!-- e-AutoPay -->
 <div id="idcrm_group" class="form-group">
	 <label class="col-sm-3 control-label" >Видеоинструкция: </label><div class="col-sm-9">
	 <p class="form-control-static"><a target="_blank" href="?page=help#eautopay">Видеоинструкция по подключению (откроется в новой вкладке)</a></p></div></div>
	  <div id="idcrm_group" class="form-group">
    <label class="col-sm-3 control-label"><strong>Примечание.</strong></label><div class="col-sm-9">
<small>Чтобы получить ключи в аккаунте администратора перейдите в раздел <strong>"Настройки"-"Настройки API".</strong><br>
Для получения <strong>user_api_key</strong> отметьте чек-бокс "Разрешить использование API-интерфейсов"<br>
Для получения <strong>customer_api_key</strong> отметьте чек-бокс "Разрешить получение всех заказов через API-интерфейс"</small> </div></div>
 

	 <br><br>
	  <div id="user_api_key_group" class="form-group">
	 <label class="col-sm-3 control-label" for="user_api_key">Ключ доступа:<br><span>user_api_key</span> 
	 </label><div class="col-sm-9"><input group="crmt" required class="form-control" <?php  if ($crm!='eautopay') echo("disabled"); ?> id="user_api_key" type="text" name="user_api_key" value="<?php echo   $user_api_key ?>" placeholder="Ключ доступа user_api_key "></div>
 </div>
	  <div id="customer_api_key_group" class="form-group">
	 <label class="col-sm-3 control-label" for="customer_api_key">Ключ доступа: <br><span>customer_api_key</span>
	
	 </label><div class="col-sm-9"><input class="form-control" <?php  if ($crm!='eautopay') echo("disabled"); ?> id="customer_api_key" type="text" name="customer_api_key" group="crmt" required value="<?php echo   $customer_api_key ?>" placeholder="Ключ доступа customer_api_key"></div>
 </div><div id="good_id_group" class="form-group">
	  <label class="col-sm-3 control-label" for="good_id">Код товара:<br><span>good_id</span> </label><div class="col-sm-9"><input class="form-control" group="crmt" required <?php  if ($crm!='eautopay') echo("disabled"); ?> id="good_id" type="text" name="good_id" value="<?php echo   $good_id ?>" placeholder="Код товара good_id"> </div>
 </div>
	
	  