<?php  
$code=md5(time());
$ca="<?php  $"."code='{$code}'; ?>";
file_put_contents('../data/amn.php', $ca);
$link="{$_SERVER['SERVER_NAME']}/config/?id={$code}";
$link_amn="<a href=\"//{$link}\">{$link}</a>";