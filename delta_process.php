<?php

include("delta_config.php");
//Database processing in this common file


/////////////////////Functions Start//////////////////////////////////
//////////////////////////////////////////////////////////////////////

function adminLogin($email)
{
  $conn = OpenCon();
  $sql = "SELECT password FROM delta_admin_config where email=? AND status='1'"; // SQL with parameters
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result(); // get the mysqli result
  $data = $result->fetch_assoc(); // fetch data
    return $data['password'];
    CloseCon($conn);
}

function addSubject($email)
{
  $conn = OpenCon();
  $sql = "SELECT password FROM delta_admin_config where email=? AND status='1'"; // SQL with parameters
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result(); // get the mysqli result
  $data = $result->fetch_assoc(); // fetch data
    return $data['password'];
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


}

//////////////////////////////////////////////////////////////////////
/////////////////////Process Based Checking Ends//////////////////////





//////////////////////////////////////////////////////////////////////
///////////START OF -->  table edit delete -- manage user
$conn = OpenCon();
$input = filter_input_array(INPUT_POST);

if($input["action"] === 'edit'or 'delete')
{
    if($input["action"] === 'edit')
    {
        $name = mysqli_real_escape_string($conn, $input["name"]);
        $who = mysqli_real_escape_string($conn, $input["who"]);
        $department = mysqli_real_escape_string($conn, $input["department"]);
        $email = mysqli_real_escape_string($conn, $input["email"]);
        $ban_status = mysqli_real_escape_string($conn, $input["ban_status"]);

        $query = " UPDATE users 
        SET 
        name = '".$name."', 
        who = '".$who."',
        department = '".$department."',
        email = '".$email."',
        ban_status = '".$ban_status."'
        WHERE id = '".$input["id"]."'";

        mysqli_query($conn, $query);

    }

    if($input["action"] === 'delete')
    {
        $query = "
        DELETE FROM users 
        WHERE id = '".$input["id"]."'
        ";
        mysqli_query($connect, $query);
    }

    echo json_encode($input);

}
///////////END OF -->  table edit delete -- manage user
//////////////////////////////////////////////////////////////////////


?>
