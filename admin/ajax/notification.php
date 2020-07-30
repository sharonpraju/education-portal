<?php

include("../../delta_config.php");
$conn = OpenCon();

$SQL="SELECT COUNT(*) FROM issue_tracker";
$result=$conn->query($SQL);
$row = $result -> fetch_assoc();
echo $row['COUNT(*)'];

?>