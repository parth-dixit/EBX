<html>
    <head><link rel="stylesheet" href="css/login.css">
     </head>

<body>
<?php
    session_start();
    if(isset($_SESSION['u_name']))
    {   ?><div id='container'><div class='signup'><?php
        $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=mysql','root','');
        echo "<br/><br/><br/>";
        $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $sql="SELECT * FROM selldet";
        $pro=$_POST['pro'];
        echo $pro;
        $result=$dbhandler->query($sql);
        $sellname='';
        while($row3=$result->fetch())
        {
            if($row3['product_name']==$pro)
            {
                echo " Seller's Name : ".$row3['Username']."<br>Product Name : ".$row3['product_name']."<br> Category : ".$row3['category']."<br>Description : ".$row3['description']."<br/>Price : ".$row3['Price']."<br>Mobile Number : ".$row3['mobile_no'];
                $sellname=$row3['Username'];
                //echo $sellname;
                break;
            }
        }
        echo "<form action='buy_chatins.php' method='post'>";
            //$_SESSION['u_buy']=$_SESSION['u_name'];
            $_SESSION['sell_name']=$sellname;
            //echo "<input type='text' name='selnam' value='$senam'><br>";
            
            
            echo "<input type='submit' value='chat'>";
        echo "</form>";
        ?></div><?php
    }
    else
    {
        header("location:login.php?msg=Please Login First");
    }
?>
</body>
</html>