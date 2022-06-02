<?php
$host="localhost";

/*$user02="root";
$pass02="1234";
$database02="bestbrush";
*/

$user02="root";
$pass02="1234";
$database02="thdirect_hdm";


$conn=  mysql_connect($host,$user02,$pass02) or die("no connect database02");
mysql_select_db($database02);
mysql_query("set names utf8");
?>