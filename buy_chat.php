<?php
    session_start();
    if(isset($_SESSION['u_name']))
    {
        try
        {
            $buychat=$_POST['buychat'];
            $from=$_SESSION['u_name'];
            $with=$_SESSION['sell_name'];
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=mysql','root','');
           // echo "Connection is established...<br/>";
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            if($buychat != NULL)
            {   
                $sql="insert into sellerchat(chat,with_,from_) values ('$buychat','$with','$from')";
                $query=$dbhandler->query($sql);
                $sql21="select * from search_";
                $result21=$dbhandler->query($sql21);
                while($row7=$result21->fetch())
                {
                    if($row7['with_']==$_SESSION['sell_name'] && $row7['from_']==$_SESSION['u_name'])
                    {
                        header("location:buy_chatins.php");
                    }
                }
                $sql22="insert into search_(from_,with_) values ('$from','$with')";
                $query1=$dbhandler->query($sql22);
            }
            header("location:buy_chatins.php");
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

