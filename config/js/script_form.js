  var message = CodeMirror.fromTextArea(document.getElementById("message"), {
		showCursorWhenSelecting: true,
		autofocus: true,
    lineNumbers: false,
   mode: "text/html",
   matchBrackets: true,
	 enterMode: "keep",
    tabMode: "shift"
     });
	var head_index64 = CodeMirror.fromTextArea(document.getElementById("head_index64"), {
		showCursorWhenSelecting: true,
		autofocus: true,
	 lineNumbers: false,
   mode: "text/html",
   matchBrackets: true,
	 enterMode: "keep",
    tabMode: "shift"
     });
		 
	var head_thanks64 = CodeMirror.fromTextArea(document.getElementById("head_thanks64"), {
		showCursorWhenSelecting: true,
		autofocus: true,
	 lineNumbers: false,
   mode: "text/html",
   matchBrackets: true,
	 enterMode: "keep",
    tabMode: "shift"
     });
	 var head_index64 = CodeMirror.fromTextArea(document.getElementById("body_index64"), {
		showCursorWhenSelecting: true,
		autofocus: true,
	 lineNumbers: false,
   mode: "text/html",
   matchBrackets: true,
	 enterMode: "keep",
    tabMode: "shift"
     });
		 
	var head_thanks64 = CodeMirror.fromTextArea(document.getElementById("body_thanks64"), {
		showCursorWhenSelecting: true,
		autofocus: true,
	 lineNumbers: false,
   mode: "text/html",
   matchBrackets: true,
	 enterMode: "keep",
    tabMode: "shift"
     });
	 
	
function og(){
	//alert($('#og_tag').val());
	if ($('#og_tag').val()==0){
		$('#og_title').prop('disabled',true);
		$('#og_desc').prop('disabled',true);
		$('#og_pic').prop('disabled',true);
		$('#og_inp').addClass('hidden');
	
	} else {
		$('#og_title').prop('disabled',false);
		$('#og_desc').prop('disabled',false);
		 if ($('#ogph').attr('value')==null) { $('#og_pic').prop('disabled',false); }
		$('#og_inp').removeClass('hidden');
		
	}
}

function valuta_func(){
	var valuta_val=$('#valuta').val();
	$('.vlt').html(valuta_val);
}

function price(){
	if ($('#price_old_select').val()==0){
		$('#skidka').prop('disabled',true);
		$('#price_old').prop('disabled',false);
	} else { $('#skidka').prop('disabled',false);
	$('#price_old').prop('disabled',true);}
}

function insite() {
	if ($('#script_pokup').val()==0){
		$('#pokup1').prop('disabled',true);
		$('#pokup1n').prop('disabled',true);
		$('#pokup2').prop('disabled',true);
		$('#pokup2n').prop('disabled',true);
		$('#insite_block').addClass('hidden');
	} else {
		$('#pokup1').prop('disabled',false);
		$('#pokup1n').prop('disabled',false);
		$('#pokup2').prop('disabled',false);
		$('#pokup2n').prop('disabled',false);
		$('#insite_block').removeClass('hidden');
	}
	
}

function pscript() {
	if ($('#script').val()==0){
		$('#auditoria').prop('disabled',true);
		$('#title').prop('disabled',true);
		$('#tovar').prop('disabled',true);
		$('#vsego').prop('disabled',true);
		$('#delay2').prop('disabled',true);
		$('#delay1').prop('disabled',true);
		$('#pscr').addClass('hidden');
	} else {
		$('#auditoria').prop('disabled',false);
		$('#title').prop('disabled',false);
		$('#tovar').prop('disabled',false);
		$('#vsego').prop('disabled',false);
		$('#delay2').prop('disabled',false);
		$('#delay1').prop('disabled',false);
		$('#pscr').removeClass('hidden');
	}
	
}

function smodal() {
	if ($('#modal').val()==0){
		$('#modal_title').prop('disabled',true);
		$('#modal_text').prop('disabled',true);
		$('#modal_text2').prop('disabled',true);
		$('#button').prop('disabled',true);
		$('#modal_delay').prop('disabled',true);
		$('#przvb').addClass('hidden');
	} else {
		$('#modal_title').prop('disabled',false);
		$('#modal_text').prop('disabled',false);
		$('#modal_text2').prop('disabled',false);
		$('#button').prop('disabled',false);
		$('#modal_delay').prop('disabled',false);
		$('#przvb').removeClass('hidden');
	}
	
}

function upscr() {
	if ($('#upsel').val()==0){
		$('#upsel_title').prop('disabled',true);
		$('#upsel_pic').prop('disabled',true);
		$('#upsel_pic_h').prop('disabled',true);
		$('#upsel_url').prop('disabled',true);
		$('#upsel_url_title').prop('disabled',true);
		$('#upsel_delay').prop('disabled',true);
		$('#ups').addClass('hidden');
	} else {
		$('#upsel_title').prop('disabled',false);
		$('#upsel_pic').prop('disabled',false);
		$('#upsel_pic_h').prop('disabled',false);
		$('#upsel_url').prop('disabled',false);
		$('#upsel_url_title').prop('disabled',false);
		$('#upsel_delay').prop('disabled',false);
		$('#ups').removeClass('hidden');
	}
	
}


function ogpicscr(){
	$('#og_pic').removeClass('hidden');
	$('#og_pic_p').addClass('hidden');
	$('#on_og_pic').addClass('hidden');
	$('#og_pic').prop('disabled',false);
	$('#ogph').prop('value','').prop('name','');
	
}

function upspicscr(){
	$('#upsel_pic').removeClass('hidden');
	$('#upsel_pic_p').addClass('hidden');
	$('#on_upsell_pic').addClass('hidden');
	$('#upsel_pic').prop('disabled',false);
	$('#ups_pic').prop('value','').prop('name','');
	
}


document.getElementById("price_old").oninput = function() {
	
	var price_old=Number($('#price_old').val());
	var price_new=Number($('#price_new').val());
	var skidka = 100-Math.floor((price_new/price_old)*100);
	$('#skidka').prop('value',skidka);
	
	};
	

document.getElementById("skidka").oninput = function() {
	
	var skidka=Number($('#skidka').val());
	var price_new=Number($('#price_new').val());
	var price_old = Math.floor((price_new/(100-skidka))*100);
	
	//alert(skidka);
	$('#price_old').prop('value',price_old);
	
	};
	
document.getElementById("price_new").oninput = function() {
	
	var skidka=Number($('#skidka').val());
	var price_new=Number($('#price_new').val());
	var price_old=Number($('#price_old').val());
	var price_old = Math.floor((price_new/(100-skidka))*100);
	var skidka = 100-Math.floor((price_new/price_old)*100);
	//alert(skidka);
	$('#price_old').prop('value',price_old);
	$('#skidka').prop('value',skidka);
	
	
	};
 
 $('document').ready(function() {
	 var r=0;
  $('.btn-primary').on('click', function() {
$('.panel-heading-info').removeClass('hidden');
$('.form-group').removeClass('has-error');
  $('.panel-heading-info').addClass('hidden');
  
  $('[required]').each(function(index)
{
       if ((!($(this).val())) && (!($(this).prop('disabled')))){
		 
		    var group=$(this).attr('group');
			 $('#'+group).removeClass('hidden');
			var idl=$(this).attr('id');
			$('#'+idl+'_group').addClass('has-error');
		
			 r=r+1;
   
	   }


});
if (r>0) {
$('#err').html('Обнаружено <b>'+r+'</b> не заполненных обязательных полей!');
$('#error').modal('show');r=0;
}
  });
});
 