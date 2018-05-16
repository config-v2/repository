 <!-- lp-crm -->
  <fieldset>
	 <legend id="idcrm"><h2>&#160;<i class="fa fa-connectdevelop"></i>&#160;Отправка информации в LP-СRМ:&#160;</h2></legend> 
	 
	 <? if ($key_crm=="") { ?>
	  <label for="product_id_crm">Продукт: </label><input disabled id="product_id_crm" type="text" name="product_id_crm" value="<?=  $product_id_crm ?>" placeholder="Будет доступен после ввода Ключа доступа и учетной записи. Нажмите ОБНОВИТЬ">
	 <? } else { 
		$data = array(
		'key' => $key_crm, //Ваш секретный токен 
		);
		 
		// запрос
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'http://'.$crm.'.lp-crm.biz/api/getProducts.html');
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$out = curl_exec($curl);
		curl_close($curl);
		//$out – ответ сервера
	    $jout=json_decode($out, true);
		if ($jout['status']=='error') echo ('<label for="product_id_crm">Ошибка: </label><input disabled id="product_id_crm" type="text" name="product_id_crm" value="" placeholder="'.$jout['message'].'">');
		else {
	 ?>
	  <label for="product_id_crm">Продукт: </label>
	  <select id="product_id_crm" name="product_id_crm">
	  <? foreach ( $jout['data'] as $key => $value) {
		  echo ('<option ');
		  if ($product_id_crm==$value['id']) echo "selected "; 
		  echo('value="'.$value['id'].'">'.$value['name'].'</option>'."\n"); 
	  } ?>
      </select>
	 <? } } ?>
	
	 <label for="key_crm">Ключ доступа: </label><input id="key_crm" type="text" name="key_crm" value="<?=  $key_crm ?>" placeholder="Ключ доступа к Вашей LP_CRM-системе.">
	 <label for="crm">Учетная запись LP-СRМ: </label><input id="crm" type="text" name="crm" value="<?=  $crm ?>" placeholder="Учетная запись Вашей LP-СRМ - ВАША_УЧЕТНАЯ_ЗАПИСЬ.lp-crm.biz.">
	 <label for="country_crm">Страна: </label>
	  <select id="country_crm" name="country_crm">
    <option <? if (($country_crm=="") OR ($country_script=="auto")) echo "selected"; ?> value="auto">Авто (по IP посетителя)</option>
    <option <? if ($country_crm=="RU") echo "selected"; ?> value="RU">Россия</option>
    <option <? if ($country_crm=="UA") echo "selected"; ?> value="UA">Украина</option>
      </select>
	  <label for="office_crm">Офис: </label><input id="office_crm" type="text" name="office_crm" value="<?=  $office_crm ?>" placeholder="ID офиса  (Можно оставить пустым)">
	   <label for="delivery_crm">Способ доставки: </label><input id="delivery_crm" type="text" name="delivery_crm" value="<?=  $delivery_crm ?>" placeholder="ID способа доставки  (Можно оставить пустым)">
	   <label for="payment_crm">Способ оплаты: </label><input id="payment_crm" type="text" name="payment_crm" value="<?=  $payment_crm ?>" placeholder="ID способа оплаты  (Можно оставить пустым)"> 
	<button  class="button25" type="submit" value="idcrm" name="button_ref"><i class="fa fa-refresh fa-spin fa-lg fa-fw"></i> Обновить</button>
	 <br>
    
  </fieldset> 