<?php
 $connected = @fsockopen("www.google.com", 80); 
 if($connected)
 {
include("../../delta_config.php");
$conn = OpenCon();
$SQL="SELECT COUNT(*) FROM issue_tracker";
$result=$conn->query($SQL);
$row = $result -> fetch_assoc();
echo $row['COUNT(*)'];
}
else{
   
    echo 1;
}
  ?>

