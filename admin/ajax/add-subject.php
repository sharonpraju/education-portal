<?php
include("../includes/session.php");
if(!empty($_POST['subject']) && !empty($_POST['description']) && !empty($_POST['teacher']) && !empty($_POST['teacher_id'])) {

include("../../delta_config.php");
$conn = OpenCon();

$subject=mysqli_real_escape_string($conn,$_POST['subject']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
$teacher=mysqli_real_escape_string($conn,$_POST['teacher']);
$teacher_id=mysqli_real_escape_string($conn,$_POST['teacher_id']);
$admin=$_SESSION['admin'];

    $sql="INSERT INTO subjects (id, name, description, teacher, teacher_id, last_updated, updated_by)
    VALUES (NULL, '$subject', '$description', '$teacher', '$teacher_id', current_timestamp(), '$admin')";
    if($conn->query($sql))
    {
        echo "1";
    }
    else
    {
        echo "0";
        echo $conn->error;
    }
    
}
else
{
    echo "Error : Somethig Went Wrong";
}

?>