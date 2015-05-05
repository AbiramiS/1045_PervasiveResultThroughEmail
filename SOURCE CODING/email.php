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

$email = $_POST["email"];
$exam = $_POST["exam"];

$sql = "SELECT * FROM `test_marks` WHERE mobile=1234 AND examination='CIA 1'";
echo $sql;
$result=mysql_query($sql);
if ($result==false)
{
    echo $result; 
}
$count=1;
// Mysql_num_row is counting table row

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "name: " . $row["name"]. "<br>  dept: " . $row["dept"]. "<br>mathematics " . $row["mathematics"]. "<br>";
    }
} else {
    echo "0 results";
}

?>