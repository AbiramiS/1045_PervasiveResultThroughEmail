<?php session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marks";
$regn=$_SESSION['registernumber'];

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);




// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Con

$tehnicalenglish1 = $_POST["tehnicalenglish1"];
$physics1= $_POST["physics1"];
$chemistry1 =$_POST["chemistry1"];
$m1=$_POST["m1"];
$eg=$_POST["eg"];
$foc=$_POST["foc"];
$attendancepercentage=$_POST["attendancepercentage1"];


$sq="UPDATE test_marks SET technicalenglish='".$tehnicalenglish1."',engineeringphysics='".$physics1."',engineeringchemistry='".$chemistry1."',mathematics='".$m1."',engineeringgraphics='".$eg."',foc='".$foc."',attendancepercentage='".$attendancepercentage."' WHERE regno='".$regn."'";
if (mysqli_query($conn, $sq)) {
      header("Location: http://localhost/notify/generateMarksheet.php?regno=$regn");
	 //echo <a href="https://www.google.co.in">Go back to the main page</a>;
} 
else {
    echo "Error: " . $sq . "<br>" . mysqli_error($conn);
}
?>