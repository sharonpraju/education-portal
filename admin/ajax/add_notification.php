<?php
include("../../delta_config.php");
$conn = OpenCon();
if(isset($_POST['delete']))
{
    $deleteId=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['id']));
    $sql="DELETE FROM notification_db WHERE id='$deleteId'";
    if ($conn->query($sql) === TRUE)
    {
        echo"Deleted";
    }
    else
    {
        echo"Error";
    }
}

else if(!empty($_POST['message']) && !empty($_POST['towhom']) )
{
    $message=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['message']));
    $towhom=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['towhom']));
    if($_POST['importantNotice']==0)
    {
        $importantnotice=0;
    }
    else
    {
        $importantnotice=1;
    }
   $SQL="INSERT INTO `notification_db` (`creator`,`content`,`department`,`is_important`) VALUES ('Admin','$message','$towhom',$importantnotice) ";
    if ($conn->query($SQL) === TRUE)
    {
        echo"Notification Updated";
    }
    else
    {
        echo"0";
    }
}
else
{
    echo "All Fields are Required";
}
?>
