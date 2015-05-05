<?php session_start();
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

$name = $_POST["name"];
$registernumber = $_POST["registernumber"];
$usertel = $_POST["usrtel"];
$EXAMINATION = $_POST["EXAMINATION"];
$DEPT = $_POST["DEPT"];


$sql="INSERT INTO test_marks(name,regno,email,examination,dept)
VALUES('".$name."','".$registernumber."','".$usertel."','".$EXAMINATION."','".$DEPT."')";

if (mysqli_query($conn, $sql)) {
	
	$_SESSION['registernumber']=$registernumber;
      header("Location: semester.html");
	 
	 //echo <a href="https://www.google.co.in">Go back to the main page</a>;
	 
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>