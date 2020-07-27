<?php
include("../../delta_config.php");
$conn = OpenCon();
if(isset($_POST['id']) && isset($_POST['edit_who']) && isset($_POST['edit_department']) && isset($_POST['edit_email'])     )
{
    $id=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['id']));
    $edit_name=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['edit_name']));
    $edit_department=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['edit_department']));
    $edit_email=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['edit_email']));
    $edit_who=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['edit_who']));


$sql="UPDATE users
SET name = '$edit_name', who= '$edit_who',department='$edit_department',email='$edit_email'
WHERE id = $id";

if($conn->query($sql))
{
    echo 'Edited and saved';

}
else
{
echo "Something Wrong with Query";
}
}
else
{
    echo "Direct Access Is Not Allowed";
}






?>