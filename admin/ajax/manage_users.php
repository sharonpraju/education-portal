<?php
include("../../delta_config.php");
$conn = OpenCon();
if(isset($_POST['id']))
{
    $id=mysqli_real_escape_string($conn,$_POST['id']);
$sql="DELETE FROM users WHERE id='$id' ";
$conn->query($sql);
}
else{
    echo "Direct Access Is Not Allowed";
}






?>