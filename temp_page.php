<?php

    session_start();
    if(isset($_SESSION['u_name']))
    {
        $_SESSION['u_buy']=$_POST['bunam'];
        header("location:sell_chatins.php");
    }
    else
    {
        header("Location:login.php?msg=PLEASE LOGIN FIRST");
    }
?>

