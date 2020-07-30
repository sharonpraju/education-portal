<?php
include("../../delta_config.php");
session_start();
$conn = OpenCon();
if(isset($_POST['logout']))
{   
   
    session_destroy();
    
   
}
else{
    echo "Direct Access Is Not Allowed";
}






?>