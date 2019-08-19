<html>
 <head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
      <link rel="stylesheet" href="css/seller.css">
</head>


    <body>
    <div id='container'>
    <div class='signup'>
    <?php
        if(empty(!isset($_GET['msg'])))
      {echo '<font color="red">'.$_GET['msg'].'</font>';
        }
    ?>      

        <form action="store.php" method="post">
            <table>
                <tr>
                    <td>Username : </td><td><input type="text" name="uname"></td>
                </tr>
                <tr>
                    <td>Password : </td><td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td>Valid Email_id : </td><td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Moblie_Number : </td><td><input type="number" name="mobnum"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="sign_in"></td>
                </tr>
            </table>
        </form>

        </div>

  
    </body>
</html>

