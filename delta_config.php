<?php
//Database Connections Here
function OpenCon()
 {
 $dbhost = "sql12.freemysqlhosting.net";
 $dbuser = "sql12356824";
 $dbpass = "JZESgt568N";
 $db = "sql12356824";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
 
?>