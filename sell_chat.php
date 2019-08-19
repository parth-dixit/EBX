<?php
    session_start();
    if(isset($_SESSION['u_name']))
    {
        try
        {
            $uses=$_SESSION['u_name'];
            $bses=$_SESSION['u_buy'];
            $sech=$_POST['sechat'];
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=mysql','root','');
            echo "Connection is established...<br/>";
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            if($sech != NULL)
            {
                $sql="insert into sellerchat(chat,from_,with_) values ('$sech','$uses','$bses')";
                $query=$dbhandler->query($sql);
            }
            header("location:sell_chatins.php");
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            die();
        }
    }
    else
    {
      header("location:login.php?msg=PLEASE LOGIN FIRST");
    }
?>