<html>
    <head><link rel="stylesheet" href="css/style2.css">
     </head>


<?php
    session_start();
    if(isset($_SESSION['u_name']))
    {   ?><div id='container'><div class='signup'><?php
        echo "<a href='buyerlist.php'>Chat with buyer</a>"; 
        $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=mysql','root','');
       // echo "Connection is established...<br/>";
        $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
                echo "<h6 align='center'>".$_SESSION['u_name']."</h6>";


    $sql5="select * from selldet";
        $result5=$dbhandler->query($sql5);
        $i=0;
        while($r=$result5->fetch())
        {
            if($r['Username']==$_SESSION['u_name'])
            {
                $i++;
                echo $i." -    Product name : ".$r['product_name']."<br> Category : ".$r['category']."<br> Expected Price : ".$r['Price'];
            }
        }?></div><?php
    }
    else
    {
        header("location:login.php?msg=PLEASE LOGIN FIRST");
    }
?>
</html>