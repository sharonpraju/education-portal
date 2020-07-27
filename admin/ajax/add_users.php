<?php
include("../delta_config.php");
$conn = OpenCon();
if(isset($_POST['teacherName'])  &&isset($_POST['teacherEmail']) &&isset($_POST['teacherPassword']) )
{
  $teacherName=mysqli_real_escape_string($conn,$_POST['teacherName']);
  $teacherEmail=mysqli_real_escape_string($conn,$_POST['teacherEmail']);
  $password=mysqli_real_escape_string($conn,$_POST['teacherPassword']);

  $sql_validator="SELECT * FROM teacher_info WHERE teacher_name='$teacherName' AND teacher_email='$teacherEmail' ";
  $result=$conn->query($sql_validator); //Execute the SQL in DB
  if($result-> num_rows > 0) //Check FOr ROWS
  {
    echo "Teacher Already Exists";
  }
  else{
    $SQL="INSERT INTO `teacher_info` (`uid`, `teacher_name`, `teacher_email`, `teacher_password`, `teacher_status`) VALUES (NULL, '$teacherName', '$teacherEmail', '$password', '1')";
    if($conn->query($SQL))
    {
      echo "Added Successfully";
    }
    else{
      echo ($conn->query($SQL));
    }
  }


}
else{
  echo "There Is Some";
}

?>

