<!-- PHP5 -->
<?php  
// $host="localhost";

// /*$user02="root";
// $pass02="1234";
// $database02="bestbrush";
// */

// $user02="root";
// $pass02="1234";
// $database02="thdirect_hdm";


// $conn=  mysql_connect($host,$user02,$pass02) or die("no connect database02");
// mysql_select_db($database02);
// mysql_query("set names utf8");
?>


<!-- PHP7 -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="thdirect_hdm";


$conn = mysqli_connect($servername, $username, $password,$dbname);

// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

date_default_timezone_set("Asia/Bangkok");

?>