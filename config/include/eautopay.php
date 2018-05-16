<!-- e-AutoPay -->
   <fieldset>
	 <legend id="user_api_key"><h2>&#160;<i class="fa fa-connectdevelop"></i>&#160;Отправка информации в e-AutoPay:&#160;</h2></legend>
<small>Для получения доступа необходимо зарегистрироваться в <a href="https://e-autopay.com/api" target="_blank"> личном кабинете<a><br>и сгенерировать <strong>customer_api_key</strong>, а также получить e-autopay ключ <strong>user_api_key</strong>.</small> 
	 <br><br>
	 <label for="user_api_key">Ключ доступа:<br><span>user_api_key</span> </label><input id="user_api_key" type="text" name="user_api_key" value="<?=  $user_api_key ?>" placeholder="Ключ доступа user_api_key "><br>
	 <label for="customer_api_key">Ключ доступа: <br><span>customer_api_key</span></label><input id="customer_api_key" type="text" name="customer_api_key" value="<?=  $customer_api_key ?>" placeholder="Ключ доступа customer_api_key"><br>
	  <label for="good_id">Код товара:<br><span>good_id</span> </label><input id="good_id" type="text" name="good_id" value="<?=  $good_id ?>" placeholder="Код товара good_id"> 
	
	 <br>
    
  </fieldset> 