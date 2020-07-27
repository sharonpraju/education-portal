<?php
include("../../delta_config.php");
$conn = OpenCon();
if(isset($_POST['process']))
{
if($_POST['process']=="change_id")
{
    $id=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['id']));
    $banStatus=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['banStatus']));
    if($banStatus==0)
    {
        $new_status=1;
       
    }
    if($banStatus==1)
    {
        $new_status=0;
    
    }
    $sql="UPDATE users SET ban_status=$new_status where id=$id"; 
    if($conn->query($sql))
    {
        echo "Status Changed";
    }
}
}

else if(isset($_POST['id']) && isset($_POST['edit_who']) && isset($_POST['edit_department']) && isset($_POST['edit_email'])     )
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