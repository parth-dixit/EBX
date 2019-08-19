<html>
    <head>
	<title>sell anything!!!!</title><link rel="stylesheet" href="css/seller.css">
    </head>

    <body>
       <div id='container'>
       <div class='signup'>
     
        
        <a href="sell_chat.php">chat with buyer</a>

	<?php
	session_start();
	if(isset($_SESSION['u_name'])){
            echo "<h5 align='center'>";

            echo "<form action='store_sell.php' method='post' enctype='multipart/form-data'>
                    <table>";
            echo "<tr>
                    <td>Your Name : </td><td><input type='text' name='uname'></td>
                </tr>";
            echo "<tr>
                    <td>Product Name : </td><td><input type='text' name='proname'></td>
                </tr>";
            echo "<tr>
                    <td>Category : </td><td><input type='text' name='categ'></td>
                </tr>";
             echo "<tr>
                    <td>Image of product : </td><td><input type='file' name='fileimage' value='fil' id='fi' ></td>
                </tr>";
           
            echo "<tr>
                    <td>Description of product : </td><td><textarea rows='10' cols='20' name='desc'></textarea></td>
                </tr>";
            echo "<tr>
                    <td>Expected Price : </td><td><input type='number' name='cost'></textarea></td>
                </tr>";
            echo "<tr>
                    <td>Mobile_Number : </td><td><input type='number' name='mobno'></td>
                </tr>";
            echo "<tr>
                    <td><input type='submit' name='submit' value='POST'></td>
                </tr>";
            echo "  </table>
                   </form>";
            echo "<h5>";
       }
        else {
          header("location:login.php?to=seller");
        }
        ?></div>
    </body>
</html>
