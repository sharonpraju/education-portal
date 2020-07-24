<?php

include("delta_config.php");
//Database processing in this common file

function adminLogin($email)
{
  $conn = OpenCon();
  $sql = "SELECT password FROM delta_admin_config where email=? AND status='1'"; // SQL with parameters
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result(); // get the mysqli result
  $data = $result->fetch_assoc(); // fetch data
  foreach ($data as &$value) {
    return $value;
    }
    CloseCon($conn);
}


$process=$_POST['process'];

if($process=="admin_login")
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hash_pass=adminLogin($email);
    if(password_verify($password, $hash_pass)) {
    $_SESSION['admin']=$email;
    header('Location: admin/dashboard.php');
    exit;
    }
    else
    {
        echo"Wrong Username / Password";
    }
}
?>