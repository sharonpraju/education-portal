<?php
if(!empty($_POST['subject']) && !empty($_POST['description']) && !empty($_POST['teacher'])) {

include("../../delta_config.php");
$conn = OpenCon();

$subject=mysqli_real_escape_string($conn,$_POST['subject']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
$teacher_id=mysqli_real_escape_string($conn,$_POST['teacher']);
$admin_id=$_SESSION['admin'];

    $sql="INSERT INTO 'subjects' ('name', 'description', 'teacher', 'last_updated', 'updated_by')
    VALUES ('$subject', '$description', '$teacher_id', current_timestamp(), '$admin_id')";
    if($conn->query($sql))
    {
        header('Location: ./add-subject.php?response=1');
    }
    else
    {
      echo "Error : Database Processing Failed <br> Somethig Went Wrong";
      header('Location: ./add-subject.php?response=0');
    }
    
}
else
{
    echo "Error : Database Processing Failed <br> Empty Data Send";
    header('Location: ./add-subject.php?response=2');
}

?>