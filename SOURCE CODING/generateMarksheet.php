<?php session_start();
$regn=[];
array_push($regn,$_SESSION['registernumber']);
require_once('driverFunctions.php');
foreach($regn as $each)
{
$data = getDetailsFromDB($each);
generateContent($each,$data);
//var_dump($data);
sendMail($each,$data['email']);
}

?>
