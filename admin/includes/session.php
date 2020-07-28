<?php
session_start();
if(!isset( $_SESSION['admin']))
{
    echo("Your session has expired");
    header('Location: index.php');
    exit;
    // kalla panni erangi poda
}
else
{
    //potte paavam veruthe vittekunnu
}
?>