<?php
$servername = "localhost";
$user = "root";
$pass = "";
$db = "access";

$conn = new mysqli($servername, $user, $pass,$db);




if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

 $db = mysqli_query($conn,"SELECT * FROM attend");

//if($db)
//echo "we are connected to db";

?>