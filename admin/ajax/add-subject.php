<?php
session_start();
if(!empty($_POST['subject']) && !empty($_POST['description']) && !empty($_POST['teacher'])) {

include("../../delta_config.php");
$conn = OpenCon();

$subject=mysqli_real_escape_string($conn,$_POST['subject']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
$teacher_id=mysqli_real_escape_string($conn,$_POST['teacher']);
$admin_id=$_SESSION['admin'];

    $sql="INSERT INTO subjects (id, name, description, teacher, last_updated, updated_by)
    VALUES (NULL, '$subject', '$description', '$teacher_id', current_timestamp(), '$admin_id')";
    if($conn->query($sql))
    {
        echo "Added Successfully";
    }
    else
    {
      echo "Error : Somethig Went Wrong";
    }
    
}
else
{
    echo "Error : Somethig Went Wrong";
}

?>