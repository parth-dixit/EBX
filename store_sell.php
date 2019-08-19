<?php
    session_start();
    
    $unam=$_POST['uname'];
    $proname=$_POST['proname'];
    $cate=$_POST['categ'];
    $descr=$_POST['desc'];
    $price=$_POST['cost'];	
    $monum=$_POST['mobno'];
	$image=$_FILES['fileimage']['name'];
	//$source = $_FILES['fileimage']['tmp_name'];
	//$target = "img/$image";
    //move_uploaded_file($source, $target);

   // function to get the characters after .!!
   function getExtension($str)
  {
   $i = strrpos($str,".");
   if (!$i)
   {
     return "";
   }
   $len = strlen($str) - $i;
   $ext = substr($str,$i+1,$len);
   return $ext;
  }
   if ($_SERVER["REQUEST_METHOD"] == "POST")
   {
   $image=$_FILES['fileimage']['name'];
   
   if (isset ($_FILES['fileimage']['name']))
   {   
     $imagename = $_FILES['fileimage']['name']; //original image
     $source = $_FILES['fileimage']['tmp_name']; //source image 
     $type=$_FILES['fileimage']['type'];
     $size=$_FILES['fileimage']['size']; 
     if ($size > 350000){
       echo "<script>alert('Size should not excide 350000bytes !!');</script>";
     }
     else
     {
     $extension = getExtension($imagename);
     $extension = strtolower($extension);
     if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif") ) 
 	{
          // if file extension is not .jpg, .jpeg, .png, .gif
          echo "<script>alert('Image Extenction Should be .jpg, .jpeg, .png, .gif only !!');</script>";
        } else {
          $target = "images/products/$proname._".$proname.".jpg";
          move_uploaded_file($source, $target);
          

          //$imagepath = $imagename;
          $save =  "images/products/$proname._".$proname.".jpg"; //This is the new file you saving
          $file =  "images/products/$proname._".$proname.".jpg"; //This is the original file

          list($width, $height) = getimagesize($file) ; 

          $tn = imagecreatetruecolor($width, $height) ; 
          $image = imagecreatefromjpeg($file) ; 
          imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height) ; 

          imagejpeg($tn, $save, 200) ; 

          $save =  "images/products/" .$proname.".jpg"; //This is the new file you saving
          $file = "images/products/$proname._".$proname.".jpg"; //This is the original file

          list($width, $height) = getimagesize($file) ; 

          $modwidth = 150; 
          $modheight = 140; 
          $tn = imagecreatetruecolor($modwidth, $modheight) ; 
          $image = imagecreatefromjpeg($file) ; 
          imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 

          imagejpeg($tn, $save, 200) ; 
          $imageval=$proname.".jpg";
          unlink("images/products/$proname._".$proname.".jpg");
          }
     }
}
}
    if(isset($_SESSION['u_name']))
    {
        try {
            
            
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=mysql','root','');
            echo "Connection is established...<br/>";
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql="insert into selldet(Username,product_name,category,description,Price,mobile_no) values ('$unam','$proname','$cate','$descr','$price','$monum')";
            $query=$dbhandler->query($sql);
            echo "Your product has been Posted Successfully";
            echo "<br>"."<a href='home.php'>HOME</a>";
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            die();
        }
    }
    else
    {
        header("location:login.php?msg=PLEASE LOGIN FIRST");
    }
?>
