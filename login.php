
<html>
    <head><link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        
        
       <div id='container'>
       <div class='signup'>
         <h2>LOGIN FORM</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Username : </td>
                    <td><input type="text" name="u_name"></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
		    <td>Enter Code <img src="captcha.php"/></td>
		    <td><input type="text" name="vercode1" /></td>
		</tr>
                <tr>
                    <td><input type="submit" value="Login"></td>
                </tr>
            </table>
        </form>
             <a href="signup.php">SIGN_UP</a>
       </div>
        <?php
            session_start();
            if(isset($_POST['u_name']) && $_POST['pass'])
            {
                $u=$_POST['u_name'];
                $p=$_POST['pass'];
                try
                {
                   $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=mysql','root','');
                   echo "Connection is established...<br/>";
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql3="select * from records";
                $result2=$dbhandler->query($sql3);
                while($row2=$result2->fetch())
                {
                    if($row2['username']==$u && $row2['password']==$p && $_POST['vercode1']==$_SESSION['vercode'])
                    {
                        $_SESSION['u_name']=$u;
                       header("location:home.php");
                    }
                }
                if(!isset($_SESSION['u_name']))
                echo "Wrong Credentials";
                //header("location:login.php?msg=WRONG USERNAME or PASSWORD");
                } catch (PDOException $ex) {
                    $ex->getMessage();
                    die();
                }
            }
            //else
            //{
            //   header("location:login.php?msg=WRONG USERNAME or PASSWORD");
            //}
        ?>
       </div>
       </body>
       </html>