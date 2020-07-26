<?php  
//action.php
$connect = mysqli_connect('164.68.110.46:3306', 'delta_x', 'x3v$ANKgwm52gbjz', 'delta_db');
$input = filter_input_array(INPUT_POST);
$newArray = array_values($input);

echo($newArray[1]);
if($newArray[1]=='delete')
{
    $delete_id=$newArray[0];
    $query = "
 DELETE FROM users 
 WHERE id = '".$delete_id."'
 ";
 mysqli_query($connect, $query);
 echo ("Deleted");
}
else
{
    $name=$newArray[1];
    $who=$newArray[2];
    $department=$newArray[3];
    $email=$newArray[4];
    $ban_status=$newArray[5];
    $query = "
    UPDATE users 
    SET 
    name = '".$name."', 
    who = '".$who."'
    department = '".$department."'
    email = '".$email."'
    ban_status = '".$ban_status."' 
    WHERE id = '".$newArray[0]."'
    ";
    echo($query);
   
    echo(mysqli_query($connect, $query));
    


}










/*
$name=$newArray[0];
$who = $newArray[1];
$department = mysqli_real_escape_string($connect, $input["department"]);
$email = mysqli_real_escape_string($connect, $input["email"]);
$ban_status = mysqli_real_escape_string($connect, $input["ban_status"]);*/

/*

if($input["action"] === 'edit')
{
 $query = "
 UPDATE users 
 SET 
 name = '".$name."', 
 who = '".$who."'
 department = '".$department."'
 email = '".$email."'
 ban_status = '".$ban_status."' 

 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);

}
if($newArray[6] === 'delete')
{
 $query = "
 DELETE FROM users 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);*/

?>