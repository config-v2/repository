 <!-- lp-crm -->
  <div id="idcrm_vidos" class="form-group">
	 <label class="col-sm-3 control-label" >Видеоинструкция: </label><div class="col-sm-9">
	 <p class="form-control-static"><a target="_blank" href="?page=help#lpcrm">Видеоинструкция по подключению (откроется в новой вкладке)</a></p></div></div>
	 
	
		 <div id="idcrm_group" class="form-group">
	 <label class="col-sm-3 control-label"  for="idcrm">Учетная запись LP-СRМ: </label><div class="col-sm-9"><input group="crmt"  class="form-control"  id="idcrm" type="text" required name="idcrm" value="<?php echo   $idcrm ?>" oninput="lpcrm_func(this.value)" placeholder="Учетная запись Вашей LP-СRМ - ВАША_УЧЕТНАЯ_ЗАПИСЬ.lp-crm.biz или ВАША_УЧЕТНАЯ_ЗАПИСЬ.lp-crm.top"></div></div>
 <div id="key_crm_group" class="form-group">
	 <label class="col-sm-3 control-label" for="key_crm">Ключ доступа: </label><div class="col-sm-9"><input group="crmt" class="form-control"  id="key_crm" type="text" required name="key_crm" value="<?php echo   $key_crm ?>" placeholder="Ключ доступа к Вашей LP_CRM-системе."></div> </div>	
	 <div class="form-group">
	 <label class="col-sm-3 control-label" for="country_crm">Страна: </label><div class="col-sm-9">
	  <select class="form-control"   id="country_crm" name="country_crm">
    <option <?php  if (($country_crm=="") OR ($country_script=="auto")) echo "selected"; ?> value="auto">Авто (по IP посетителя)</option>
    <option <?php  if (($country_crm=="RU") OR ($country_script=="RU")) echo "selected"; ?> value="RU">Россия</option>
    <option <?php  if (($country_crm=="UA") OR ($country_script=="UA")) echo "selected"; ?> value="UA">Украина</option>
	<option <?php  if (($country_crm=="BY") OR ($country_script=="BY")) echo "selected"; ?> value="BY">Белорусь</option>
    <option <?php  if (($country_crm=="KZ")OR ($country_script=="KZ")) echo "selected"; ?> value="KZ">Казахстан</option>
      </select></div></div>	
 <div id="product_id_crm_group" class="form-group">
	  <label class="col-sm-3 control-label" for="product_id_crm">Продукт: </label><div class="col-sm-9"> <input class="form-control"   group="crmt" required id="product_id_crm" type="text" name="product_id_crm" value="<?php echo   $product_id_crm ?>" placeholder="ID продукта в каталоге товара LP-СRМ"></div>
	
	</div>
	  <div class="form-group">
	  <label  class="col-sm-3 control-label" for="office_crm">Офис: </label><div class="col-sm-9"><input class="form-control"  id="office_crm" type="text" name="office_crm" value="<?php echo   $office_crm ?>" placeholder="ID офиса  (Можно оставить пустым)"></div></div>	 <div class="form-group">
	   <label class="col-sm-3 control-label" for="delivery_crm">Способ доставки: </label><div class="col-sm-9"><input class="form-control"  id="delivery_crm" type="text" name="delivery_crm" value="<?php echo   $delivery_crm ?>" placeholder="ID способа доставки  (Можно оставить пустым)"></div></div>	 <div class="form-group">
	   <label class="col-sm-3 control-label" for="payment_crm">Способ оплаты: </label><div class="col-sm-9"><input class="form-control"  id="payment_crm" type="text" name="payment_crm" value="<?php echo   $payment_crm ?>" placeholder="ID способа оплаты  (Можно оставить пустым)"> </div>
	<!-- <button  class="button25" type="submit" value="idcrm" name="button_ref"><i class="fa fa-refresh fa-spin fa-lg fa-fw"></i> Обновить</button> -->
	 </div>
	 <script> 
	 function lpcrm_func(uz){
		 if ((uz.indexOf('.biz') + 1)||(uz.indexOf('.top') + 1)) {
		 var uz1=uz.replace("http://","");
		 var uz2=uz1.replace("https://","");
		 var uz3=uz2.replace("/","");
		 $('#idcrm').prop('value',uz3);
		 }
		 
	 }
	 </script>
    
  