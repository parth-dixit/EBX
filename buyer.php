<html>
    <head>
        <title>Buy anything!!!!</title><link rel="stylesheet" href="css/buyer.css">
    </head>
    <body>
        <div id='container'>
<?php
    echo "Welcome to our Website!!!<br>";
    session_start();
    
    if(isset($_SESSION['u_name']))
    {
        echo "<a href='sell.php'>Sell</a>&nbsp;&nbsp;";
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
           
                while($rows=$result->fetch())
                {	
					 ?><div id='container'><div class='signup'><?php
                    $i=$i+1;
                    echo " ".$i.  " :  Seller's Name : ".$rows['Username']."<br>Product Name : ".$rows['product_name']."<br> Category : ".$rows['category']."<br>";
                    echo"Price: ".$rows['Price']."<br>Product Name: ".$rows['product_name']."<br>";
                    echo "<form action='sell_chatins.php' method='post'>";
                    $name=$rows['product_name'];
					echo $name;
					$tmp="images/products/".$name;
					echo "<img id='imgCaptcha' src='$tmp' height='140' width='150'  />";
					echo "<input type='submit' name='buy' value='BUY'>";
                    echo "</form>";
                    echo "<br></br>";
                ?></div><?php
				
}
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