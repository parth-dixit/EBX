<?php
    session_start();
    if(isset($_SESSION['u_name']))
    {
        unset($_SESSION['u_name']);
        unset($_SESSION['u_buy']);
        header('location:login.php?msg=You Have Successfully Logged Out');
    }
    else
    {
        header("location:login.php");
    }
?>

