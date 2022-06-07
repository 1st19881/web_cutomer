<?php
// $host="localhost";

/*$user02="root";
$pass02="1234";
$database02="thdirect_hdm";
*/

// $user02="root";
// $pass02="1234";
// $database02="thdirect_hdm";

// php 5
// $conn=  mysql_connect($host,$user02,$pass02) or die("no connect database02");
// mysql_select_db($database02);
// mysql_query("set names utf8");

// php 7

$conn = mysqli_connect("localhost","root","","thdirect_hdm") or die("Error: " . mysqli_error($conn));
mysqli_query($conn, "SET NAMES 'utf8' ");
date_default_timezone_set('Asia/Bangkok');

?>