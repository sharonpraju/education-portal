<?php
session_start();
if(!isset( $_SESSION['admin']))
{
    echo('<script>alert("Your session has expired")</script>');
    header('Location: ./index.php');
    exit;
    // kalla panni erangi poda
}
else
{
    //potte paavam veruthe vittekunnu
}
?>