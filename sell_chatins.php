<html>
    <head></head>
    <body>
        <style>
            body{
           background-color: #BDB76B;
            }
            h4{
                color: #000000;
            }
        </style>
        <?php
            session_start();
            if(isset($_SESSION['u_name']))
           {
                echo $_SESSION['u_name'];
                try
                {
                $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=mysql','root','');
                //echo "Connection is established...<br/>";
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql1="select * from sellerchat";
                $result1=$dbhandler->query($sql1);
                    while($row=$result1->fetch())
                    {
                        if($row['chat']!=NULL && $row['from_'] == $_SESSION['u_name'] && $row['with_']==$_SESSION['u_buy'])
                        {
                            echo "<h5 align='left'>";
                            echo "You : ".$row['chat'];
                            echo "</h5><br>";
                        }
                        if($row['chat']!=NULL && $row['with_']==$_SESSION['u_name'] && $row['from_'] == $_SESSION['u_buy'])
                        {
                            echo "<h2 align='center'>".$_SESSION['u_buy']." : ".$row['chat']."</h2>";
                            echo "<br>";
                        }
                    }
                }
                catch(PDOException $ex)
                {
                    $ex->getMessage();
                    die();
                }
            }
            else
            {
                header("location:login.php?msg=Please login first");
            }
        ?>
        <form action="sell_chat.php" method="post">
          <h1><textarea rows="3" cols="35" name="sechat"></textarea>
            <br/>
            <input type="submit" name="submit1" value="enter">
          </h1>
        </form>
    </body>
</html>

