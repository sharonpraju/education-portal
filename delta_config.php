<?php
//Database Connections Here adasdasd
function OpenCon()
 {
 $dbhost = "164.68.110.46:3306";
 $dbuser = "delta_x";
 $dbpass = 'x3v$ANKgwm52gbjz';
 $db = "delta_db";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 //$dbhost = "127.0.0.1:3306";
 //$dbuser = "root";
 //$dbpass = '';
 //$db = "delta_db";
 //$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 


 
 

 



 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
 
?>

