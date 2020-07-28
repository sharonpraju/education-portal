<?php

include("delta_config.php");
//Database processing in this common file




/////////////////////Functions Start//////////////////////////////////
//////////////////////////////////////////////////////////////////////

function adminLogin($email)
{
  session_start();
  $conn = OpenCon();
  $sql = "SELECT pass_hash FROM users where email=? AND status='1'"; // SQL with parameters
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
  $sql = "SELECT id FROM users where email=? AND status='1'"; // SQL with parameters
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
    

    if($process=="admin_login")
    {
        
        $email=$_POST['email'];
        $password=$_POST['password'];
        $hash_pass=adminLogin($email);
        $id=getID($email);
        echo "<script>alert(fa-stack-1x)</script>";
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






//////////////////////////////////////////////////////////////////////
///////////START OF -->  Profile edit -- 


    
    if($process=="profile_edit")
    {
        $name=$_POST['name'];
        $department=$_POST['department'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $id=$_POST['id'];

        

       

        $target_dir = "admin/img/profile/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }
        }
        

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } 
        else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } 
            else {
              echo "Sorry, there was an error uploading your file.";
            }
          }
  

        $sql="UPDATE users
        SET name = '$name' AND profile_url = '$target_file' AND department='$department' AND email='$email' AND phone='$phone' AND password=$password
        WHERE id = $id";
        $conn = OpenCon();
        echo $sql;
        if($conn->query($sql))
        {
          echo "Added Successfully";
        }
        else{
            echo ($conn->query($sql));
          }
    }


}

//////////////////////////////////////////////////////////////////////
/////////////////////Process Based Checking Ends//////////////////////






?>
