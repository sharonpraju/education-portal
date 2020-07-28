<?php
session_start();
if(!isset( $_SESSION['admin']))
{
<<<<<<< HEAD
    echo('<script>alert("Your session has expired")<?script>');
=======
>>>>>>> e392f7cd61fc2b629cb62b512c910f41da56aa78
    header('Location: index.php');
    exit;
    // kalla panni erangi poda
}
else
{
    //potte paavam veruthe vittekunnu
}
?>