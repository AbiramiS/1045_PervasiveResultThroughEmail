<?php
$to = "sureshnarayanasaamy@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: sureshnarayanasaamy@gmail.com" . "\r\n" .
"CC: sureshkounder@yahoo.com";
$res=mail($to,$subject,$txt,$headers);
if($res)
	echo "success";
else
	echo "failed";
	print_r(error_get_last());
?>