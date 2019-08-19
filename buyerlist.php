<head><link rel="stylesheet" href="css/temp2.css"></head>


<?php
    session_start();
    if(isset($_SESSION['u_name']))
    {
        try
        {
            
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=mysql','root','');
                //echo "Connection is established...<br/>";
                $name=$_SESSION['u_name'];
                //echo $name;
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql1="select * from sellerchat where from_='$name'";
                $result1=$dbhandler->query($sql1);
                $count=$result1->rowCount();
                $k=1;
              //  while($row5=$result1->fetch())
                //{
                  //  $i=1;
                    //for ($i=1;$i<=$k;$i++)
//                    {
  //                      if( $row5['with_']==$_SESSION['u_name'])
    //                    {
      //                      break;
        //                }
          //          }
            //        echo "i = ".$i." k = ".$k;
//                    if($i==$k && $row5['from_']==$_SESSION['u_name'])
  //                  {
    //                    $k++;
      //                  $arr[]=$row5['with_'];
        //                $bunam=$row5['with_'];
          //              echo $bunam."vjl";
            //            echo "<form action='temp_page.php' method='post'>";
              //              echo "<input type='text' name='bunam' value='$bunam'><br>";
                //            echo "<input type='submit' value='chat'>";
                  //      echo "</form>"; 
            //        }
              //  }
                $sql2="select * from search_";
                $result2=$dbhandler->query($sql2);
                while($row6=$result2->fetch())
                {?><div id='container'><div class='signup'><?php
                    if($row6['with_']==$_SESSION['u_name'])
                    {
                        echo "<h3 align='center'>";
                        $bunam=$row6['from_'];
                        echo $bunam;
                        echo "<form action='temp_page.php' method='post'>";
                            echo "<input type='text' name='bunam' value='$bunam'><br>";
                            echo "<input type='submit' value='chat'>";
                        echo "</form>";
                        echo "</h3>";?></div><?php
                    }
                }
        } catch (PDOException $ex) {
            //echo $ex->getMessage();
            die();

        }
    }
    else
    {
        header("location:login.php?msg=PLEASE LOGIN FIRST");
    }
?>
