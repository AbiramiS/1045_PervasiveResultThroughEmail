<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marks";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);




// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$emailId = $_POST["userid"];
$confirmemailId = $_POST["password"];



$sql="INSERT INTO login(username,password)
VALUES('".$emailId."','".$confirmemailId."')";

if (mysqli_query($conn, $sql)) {
      //header("Location: bank_details.html");
	 //echo <a href="index.php">Go back to the main page</a>;
	 
	 echo 'Successfully Registered';
	 //echo '<a href="index.html">Go back to the main page</a>';
	 
} 
else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>