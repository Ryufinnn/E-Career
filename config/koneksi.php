<?php
$server = "localhost";
$user = "root";
$pass = "";
$mysql_db = "db_career";
mysql_connect($server, $user, $pass)or die("Error Connecting to MYSql Server:".mysql_error());  
mysql_select_db($mysql_db)or die("Error Selecting MYSql Database:".mysql_error());  
?>
