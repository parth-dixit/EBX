<html>
    <body>
	<?php
	session_start();
        
	if(true)
         {
            try{
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=mysql','root','');
            echo "Connection is established...<br/>";
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $un=filter_input(INPUT_POST,"username",FILTER_DEFAULT);
            $userstr=$_POST['uname'];
            $pw=$_POST['pass'];
            $mn=$_POST['mobnum'];

            if (preg_match("/^[1-9][0-9]*$/", $mn)) {
                if(strlen($pw) < 8) {}
                else{   header("location:signup.php?msg=password must be at least 8 characters");  }
            }
            else{
                header("location:signup.php?msg=invalid mobile number");
                }





            $sql="insert into records (username,password,mobile) values ('$userstr','$pw','$mn')";
            
            $query=$dbhandler->query($sql);
            //$query=$dbhandler->prepare($sql);
            $query->execute(array($un,$pw,$mn));
            echo $un."Data is inserted successfully</br>";
            echo "$un "."<br />"."$pw "."<br />"."$mn "."<br />";
            echo "<a href='login.php'>Log In</a>";
    }
    catch(PDOException $e){
            echo "hiii    ".$e->getMessage();
            die();
    }
        }
        else {
            header("location:home.php");
        }
        ?>
    </body>
</html>
