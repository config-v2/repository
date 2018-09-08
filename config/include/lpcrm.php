 <!-- lp-crm -->
  
	 
	
		 <div id="key_crm_group" class="form-group">
	 <label class="col-sm-3 control-label" for="key_crm">Ключ доступа: </label><div class="col-sm-9"><input group="crmt" class="form-control" <? if ($crm!='lpcrm') echo("disabled"); ?> id="key_crm" type="text" required name="key_crm" value="<?=  $key_crm ?>" placeholder="Ключ доступа к Вашей LP_CRM-системе."></div> </div>	 <div id="idcrm_group" class="form-group">
	 <label class="col-sm-3 control-label"  for="idcrm">Учетная запись LP-СRМ: </label><div class="col-sm-9"><input group="crmt" class="form-control" <? if ($crm!='lpcrm') echo("disabled"); ?> id="idcrm" type="text" required name="idcrm" value="<?=  $idcrm ?>" placeholder="Учетная запись Вашей LP-СRМ - ВАША_УЧЕТНАЯ_ЗАПИСЬ.lp-crm.biz."></div></div>	 <div class="form-group">
	 <label class="col-sm-3 control-label" for="country_crm">Страна: </label><div class="col-sm-9">
	  <select class="form-control" <? if ($crm!='lpcrm') echo("disabled"); ?>  id="country_crm" name="country_crm">
    <option <? if (($country_crm=="") OR ($country_script=="auto")) echo "selected"; ?> value="auto">Авто (по IP посетителя)</option>
    <option <? if ($country_crm=="RU") echo "selected"; ?> value="RU">Россия</option>
    <option <? if ($country_crm=="UA") echo "selected"; ?> value="UA">Украина</option>
	<option <? if ($country_crm=="BY") echo "selected"; ?> value="BY">Белорусь</option>
    <option <? if ($country_crm=="KZ") echo "selected"; ?> value="KZ">Казахстан</option>
      </select></div></div>	
 <div id="product_id_crm_group" class="form-group">
	  <label class="col-sm-3 control-label" for="product_id_crm">Продукт: </label><div class="col-sm-9"> <input class="form-control" <? if ($crm!='lpcrm') echo("disabled"); ?>  group="crmt" required id="product_id_crm" type="text" name="product_id_crm" value="<?=  $product_id_crm ?>" placeholder="ID продукта в каталоге товара LP-СRМ"></div>
	
	</div>
	  <div class="form-group">
	  <label  class="col-sm-3 control-label" for="office_crm">Офис: </label><div class="col-sm-9"><input class="form-control" <? if ($crm!='lpcrm') echo("disabled"); ?> id="office_crm" type="text" name="office_crm" value="<?=  $office_crm ?>" placeholder="ID офиса  (Можно оставить пустым)"></div></div>	 <div class="form-group">
	   <label class="col-sm-3 control-label" for="delivery_crm">Способ доставки: </label><div class="col-sm-9"><input class="form-control" <? if ($crm!='lpcrm') echo("disabled"); ?> id="delivery_crm" type="text" name="delivery_crm" value="<?=  $delivery_crm ?>" placeholder="ID способа доставки  (Можно оставить пустым)"></div></div>	 <div class="form-group">
	   <label class="col-sm-3 control-label" for="payment_crm">Способ оплаты: </label><div class="col-sm-9"><input class="form-control" <? if ($crm!='lpcrm') echo("disabled"); ?> id="payment_crm" type="text" name="payment_crm" value="<?=  $payment_crm ?>" placeholder="ID способа оплаты  (Можно оставить пустым)"> </div>
	<!-- <button  class="button25" type="submit" value="idcrm" name="button_ref"><i class="fa fa-refresh fa-spin fa-lg fa-fw"></i> Обновить</button> -->
	 </div>
    
  