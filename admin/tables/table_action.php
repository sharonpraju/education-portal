<?php  
//action.php
$connect = mysqli_connect('164.68.110.46:3306', 'delta_x', 'x3v$ANKgwm52gbjz', 'delta_db');
$input = filter_input_array(INPUT_POST);

$name = mysqli_real_escape_string($connect, $input["name"]);
$who = mysqli_real_escape_string($connect, $input["who"]);
$department = mysqli_real_escape_string($connect, $input["department"]);
$email = mysqli_real_escape_string($connect, $input["email"]);
$ban_status = mysqli_real_escape_string($connect, $input["ban_status"]);



if($input["action"] === 'edit')
{
 $query = " UPDATE users 
 SET 
 name = '".$name."', 
 who = '".$who."',
 department = '".$department."',
 email = '".$email."',
 ban_status = '".$ban_status."'
 WHERE id = '".$input["id"]."'";

 mysqli_query($connect, $query);

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

?>