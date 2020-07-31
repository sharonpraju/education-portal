<?php
include("../../delta_config.php");
$conn = OpenCon();
if(isset($_POST['teacherName'])  &&isset($_POST['teacherEmail']) &&isset($_POST['teacherPassword']) )
{
  $teacherName=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['teacherName']));
  $teacherEmail=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['teacherEmail']));
  $password=password_hash(mysqli_real_escape_string($conn,$_POST['teacherPassword']),PASSWORD_DEFAULT);
  $position=mysqli_real_escape_string($conn,$_POST['position']);
  $teacher_department=mysqli_real_escape_string($conn,$_POST['teacher_department']);

  $sql_validator="SELECT * FROM users WHERE name='$teacherName' AND email='$teacherEmail' ";
  $result=$conn->query($sql_validator); //Execute the SQL in DB
  if($result-> num_rows > 0) //Check FOr ROWS
  {
    echo "Teacher Already Exists";
  }
  else{
    $SQL="INSERT INTO `users` (`id`, `name`, `who`, `department`, `email`, `ban_status`,  `pass_hash`, `last_updated`, `status`, `comments`)
     VALUES (NULL, '$teacherName', '$position', '$teacher_department', '$teacherEmail',0,  '$password', current_timestamp(), '1', '');";

    
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