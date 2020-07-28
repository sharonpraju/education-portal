<?php
include("../../delta_config.php");
include("../includes/session.php");

$admin=$_SESSION['admin'];

$conn = OpenCon();
if(isset($_POST['id']) && isset($_POST['subject']) && isset($_POST['description']) && isset($_POST['teacher']) && isset($_POST['teacher_id']))
{
    $id=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['id']));
    $name=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['subject']));
    $description=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['description']));
    $teacher=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['teacher']));
    $teacher_id=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['teacher_id']));
    


$sql="UPDATE subjects
SET name = '$name', description= '$description', teacher='$teacher',teacher_id='$teacher_id', last_updated=current_timestamp(), updated_by='$admin'
WHERE id = $id";

if($conn->query($sql))
{
    echo "1";

}
else
{
echo "0";
}
}
else
{
    echo "Direct Access Is Not Allowed";
}






?>