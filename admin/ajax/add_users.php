<?php
include("../../delta_config.php");
$conn = OpenCon();
if(isset($_POST['teacherName'])  &&isset($_POST['teacherEmail']) &&isset($_POST['teacherPassword']) )
{
  $teacherName=mysqli_real_escape_string($conn,$_POST['teacherName']);
  $teacherEmail=mysqli_real_escape_string($conn,$_POST['teacherEmail']);
  $password=mysqli_real_escape_string($conn,$_POST['teacherPassword']);

  $sql_validator="SELECT * FROM users WHERE name='$teacherName' AND email='$teacherEmail' ";
  $result=$conn->query($sql_validator); //Execute the SQL in DB
  if($result-> num_rows > 0) //Check FOr ROWS
  {
    echo "Teacher Already Exists";
  }
  else{
    $SQL="  INSERT INTO `users` (`id`, `name`, `who`, `department`, `email`, `ban_status`, `profile_url`, `pass_hash`, `last_updated`, `status`, `comments`) VALUES (NULL, '$teacherName', 'teacher', '', 'asd@asd.comfk', '0', '', '', current_timestamp(), '1', '');";
    
  
    
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

