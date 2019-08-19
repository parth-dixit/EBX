<html>
    <head><link rel="stylesheet" href="css/chatb.css"></head>
    
    <body>
        <h4 align='center'>Chatting</h4>
        
        <?php
            session_start();
            ?><div id='container'><div class='signup'><?php
            
            if(isset($_SESSION['u_name']))
            {
                try
                {
                    //echo $_SESSION['u_name']." seller = ".$_SESSION['sell_name'];
                    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=mysql','root','');
                    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $sql4="select * from sellerchat";
                    $result4=$dbhandler->query($sql4);
                    //if($result->num_rows > 0)
                    //{
                        while($row4=$result4->fetch())
                        {
                           // echo "from = ".$row4['from_']." with = ".$row4['with_'].'<br>';
                            if($row4['chat']!= NULL && $row4['from_']==$_SESSION['u_name'] && $row4['with_']==$_SESSION['sell_name'])
                            {
                                echo "YOU"." : ".$row4['chat'];
                                echo "<br><br>";
                            }
                           // echo $_SESSION['u_name']." from = ".$row4['from']."<br>";
                            if($row4['chat']!=NULL && $row4['with_']==$_SESSION['u_name'] && $row4['from_']==$_SESSION['sell_name'])
                            {
                                echo "<h3 align='right'>".$_SESSION['sell_name']." : ".$row4['chat']."<h3>";
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
               header("location:login.php?msg=PLEASE LOGIN FIRST");
            }
        ?>
        <form action="buy_chat.php" method="post">
            <textarea rows="3" cols="20" name="buychat" ></textarea>
            <input type="submit" name="submit1" value="enter">
        </form>
                    </div>
    </body>
</html>

