<?php
if(isset($_REQUEST['regno']))
{
$regno = array();
$regno = $_REQUEST['regno'];
require_once('driverFunctions.php');
foreach($regno as $each)
{
$data = getDetailsFromDB($each);
generateContent($each,$data);
//var_dump($data);
sendMail($each,$data['email']);
}
}
else
echo 'Pass Register Number as paramater';
?>
