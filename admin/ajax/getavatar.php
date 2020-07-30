<?php
include("../../delta_config.php");
include("../includes/session.php");
$admin=$_SESSION['admin'];
$conn_1 = OpenCon();
$sql_1 = "SELECT profile_url FROM users where id=? AND ban_status='0'"; // SQL with parameters
$stmt_1 = $conn_1->prepare($sql_1); 
$stmt_1->bind_param("s", $admin);
$stmt_1->execute();
$result_1 = $stmt_1->get_result(); // get the mysqli result
$data_1 = $result_1->fetch_assoc(); // fetch data
$user_avatar="img/profile/".$data_1['profile_url'];
echo $user_avatar;
CloseCon($conn_1);
?>