<html>
    <head><link rel="stylesheet" href="css/temp2.css">
     </head>
<body>
<?php
    echo "<h1 align='center'>Welcome to our Website!!!</h1><br>";
    session_start();
    
    if(isset($_SESSION['u_name']))
    {
        echo "<a href='sell.php'>Sell</a>&nbsp;&nbsp;";
        echo "<h5 align='right'><a href='logout.php'>Log out</a></h5>&nbsp;&nbsp;";
        echo "\n<a href='buyer.php'>Buy</a>";
        echo "<br><a href='profile.php'>Veiw your Profile</a>&nbsp;&nbsp;";
        try
        {
            $i=0;
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=mysql','root','');
            echo "<br/><br/><br/>";
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
            $sql="SELECT * FROM selldet";
            $result=$dbhandler->query($sql);
            // if($result->num_rows > 0)
             
 
                $prona='';
                while($rows=$result->fetch())
                {?><div id='container'><div class='signup'><?php
                    $i=$i+1;
                    echo " ".$i.  " :  Seller's Name : ".$rows['Username']."<br>Product Name : ".$rows['product_name']."<br> Category : ".$rows['category']."<br>Price : ".$rows['Price']."<br>";
                    echo "<form action='confirm.php' method='post'>";
                    $prona=$rows['product_name'];
                   
                     $name=$rows['product_name'];
					$tmp="images/products/".$name;
					echo "<img id='imgCaptcha' src='$tmp' height='140' width='150'  />";
		
                    echo "<input type='submit' name='buy' value='BUY'>";
                    echo "</form>";
                    echo "<br><br>";
                ?></div><?php
                    
                    
                }
            //}
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
 else {
        header("location:login.php?msg=Please Login First");
 }

?>
</body>
</html>
