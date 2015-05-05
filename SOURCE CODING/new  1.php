<?php session_start();
$regn=$_SESSION['registernumber'];
require_once('driverFunctions.php');
foreach($regno as $each)
{
$data = getDetailsFromDB($regn);
generateContent($regn,$data);
//var_dump($data);
sendMail($regn,$data['email']);
}
header("Location: index.html");
?>
