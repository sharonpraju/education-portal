<?php
session_start();
include("delta_config.php");
//Database processing in this common file




/////////////////////Functions Start//////////////////////////////////
//////////////////////////////////////////////////////////////////////

function adminLogin($email)
{
  $conn = OpenCon();
  $sql = "SELECT pass_hash FROM users where email=? AND ban_status='0'"; // SQL with parameters
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result(); // get the mysqli result
  $data = $result->fetch_assoc(); // fetch data
    return $data['pass_hash'];
    CloseCon($conn);
}

function getID($email)
{
  $conn = OpenCon();
  $sql = "SELECT id FROM users where email=? AND ban_status='0'"; // SQL with parameters
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result(); // get the mysqli result
  $data = $result->fetch_assoc(); // fetch data
  return $data['id'];
  CloseCon($conn);
}



//////////////////////////////////////////////////////////////////////
/////////////////////Functions Ends///////////////////////////////////



/////////////////////Process Based Checking Start/////////////////////
//////////////////////////////////////////////////////////////////////

if (isset($_POST['process']))

{ 
    
    $process=$_POST['process'];

    /////////////////////Login//////////////////////
    
    if($process=="admin_login")
    {
        
        $email=$_POST['email'];
        $password=$_POST['password'];
        $hash_pass=adminLogin($email);
        $id=getID($email);
        if(password_verify($password, $hash_pass)) {
        $_SESSION['admin']=$id;
        header('Location: admin/dashboard.php');
        exit;
        }
        else
        {
            echo"Wrong Username / Password";
        }
    }


    /////////////////////Profile Edit//////////////////////
    
    if($process=="profile_edit")
    {

      $log=1;
      
        $conn = OpenCon();
        $name=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['name']));
        //$department=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['department']));
        $email=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['email']));
        $phone=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['phone']));
        $id=htmlspecialchars(mysqli_real_escape_string($conn,$_POST['id']));

        
        
        $sql = "SELECT pass_hash FROM users where id=? AND ban_status='0'"; // SQL with parameters
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $data = $result->fetch_assoc(); // fetch data
        $pass_hash=$data['pass_hash'];

        if(!empty($_POST['password']) )
        { 
          $password=$_POST['password'];

          if(password_verify($password, $pass_hash)) {
            $new_password=password_hash($_POST['new_password'], PASSWORD_DEFAULT);
          }
          else
          {
            $log=$log*0;
            $new_password=$pass_hash;
            echo"Current password is wrong !<br>";
          }
        }
        else
        {
          $new_password=$pass_hash; // Updating password with current password
        }


        if(!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name']))
        {

              $sql="UPDATE users
              SET name = '$name', email='$email', phone='$phone', pass_hash='$new_password', last_updated=current_timestamp()
              WHERE id = '$id'";
              if($conn->query($sql))
              {
                if($log==1)
                {
                  echo $log;
                }
                //echo "Added Successfully";
              }
              else
              {
                $log=$log*0;
                //echo $log;
                //echo ($conn->error);
              }


        }
        else
        {

              $target_dir = "admin/img/profile/";
              $temp = explode(".", $_FILES["fileToUpload"]["name"]);
              $newfilename = round(microtime(true)) . '.' . end($temp);
              //$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);//same name
              $target_file = $target_dir . $id . $newfilename;
              $uploadOk = 1;
              $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              $img=$id . $newfilename;

              // Check if image file is a actual image or fake image
              if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                  //echo "File is an image - " . $check["mime"] . ".<br>";
                  $uploadOk = 1;
                } else {
                  $log=$log*0;
                  echo "File is not an image.<br>";
                  $uploadOk = 0;
                }
              }
            
            
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $log=$log*0;
                echo "<b>ERROR : </b> Only JPG, JPEG, PNG & GIF files are allowed.<br>";
                $uploadOk = 0;
              }
            
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                $log=$log*0;
                echo "<b>ERROR : </b> Your file was not uploaded.<br>";
                $img_upload=0; // to change sql query
              // if everything is ok, try to upload file
              } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                  $img_upload=1; // to change sql query
                  //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
                } else {
                  $log=$log*0;
                  $img_upload=0; // to change sql query
                  echo "<b>ERROR : </b> There was an error uploading your file.<br>";
                }
              }

              if($img_upload==1) // Image uploaded
              {
                $sql="UPDATE users
                SET name = '$name', profile_url = '$img', email='$email', phone='$phone', pass_hash='$new_password', last_updated=current_timestamp()
                WHERE id = '$id'";
                if($conn->query($sql))
                {
                  if($log==1)
                  {
                    echo $log;
                  }
                  //echo "Added Successfully";
                }
                else
                {
                  $log=$log*0;
                  //echo $log;
                  //echo ($conn->error);
                }
              }
              else if($img_upload==0) // Image not uploaded
              {
                $sql="UPDATE users
                SET name = '$name', email='$email', phone='$phone', pass_hash='$new_password', last_updated=current_timestamp()
                WHERE id = '$id'";
                if($conn->query($sql))
                {
                  if($log==1)
                  {
                    echo $log;
                  }
                  //echo "Added Successfully";
                }
                else
                {
                  $log=$log*0;
                  //echo $log;
                  //echo ($conn->error);
                }
              }
              else
              {
                echo "<strong>Error : Unknown Error !";
              }
        }
        CloseCon($conn);
    }
}

//here log is returned only if it is one, because we are displaying the returned error from here on profile page.
//if log is 0 then the error showing on the profile page will show a 0 at the end.
//////////////////////////////////////////////////////////////////////
/////////////////////Process Based Checking Ends//////////////////////
?>
