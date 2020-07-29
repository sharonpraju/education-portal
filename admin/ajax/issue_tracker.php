<?php
include("../../delta_config.php");
$conn = OpenCon();
if(isset($_POST['id']))
{
    $id=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['id']));
    $sql="UPDATE issue_tracker SET issue_status=0 where id=$id"; 
    if($conn->query($sql))
    {
        echo "Status Changed";
    }
}
?>