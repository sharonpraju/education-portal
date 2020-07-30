<?php
include("../../delta_config.php");
$conn = OpenCon();
if(!empty($_POST['id']))
{
    $id=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['id']));
    $sql="DELETE FROM subjects WHERE id='$id'";
    if ($conn->query($sql) === TRUE)
    {
        echo"1";
    }
    else
    {
        echo"0";
    }
}
else
{
    echo "Direct Access Is Not Allowed";
}
?>