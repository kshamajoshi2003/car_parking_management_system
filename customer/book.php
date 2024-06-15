<?php
 session_start();
 //get request date
 $id=$_REQUEST["id"];
 $_SESSION["id"]=$id;
 $time=$_REQUEST["time"];
 $slotno=$_REQUEST["slotno"];
 $bookingdate=$_SESSION["slotdate"];
 $totimearray=array();
$str="";
 $msg="";
 $count=0;
   //explode fromtime
   $temptime=explode(":", $time);
   $x=$temptime[0];  //hours ofstarttime
 try
 {
    $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stmt=$conn->prepare("select * from slotsheet where slotdate=? and id>? and slotno=?");
    $stmt->bindParam(1,$bookingdate);
    $stmt->bindParam(2,$id);
    $stmt->bindParam(3,$slotno);
    $stmt->execute();
    $c=$stmt->rowCount();
    
    if($c>0)
    {
      
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            $str.=$row["status"];
            $temptotime=$row["slottime"];  //totime
            $y=explode(":",$temptotime);
            $z=$y[0];   //hours of nexttime
            if($row["status"]=="Available")
            {               
                if($z>$x)
                    array_push($totimearray,$row);
            }
            else
            {
                array_push($totimearray,$row);
                break;
            }
        }
    }
}
catch(Exception $e)
{
    $msg="Error ".$e->getMessage();
    header("location:customeroutput.php?msg=$msg");
}
?>
<html>
    <head>
        <title></title>
        <?php
            include'header_link.php';
        ?>
    <body>
    <?php
             include'header.php';
            
        ?>
         <h3 style=' border-radius: 25px;
          border: 2px solid #73AD21;
          padding: 12px;
          width: 300px;
          height: 60px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 500px;
      '>Book</h3><br><br><br><hr>
        <form method="POST" action="updatebooking.php" style=" margin-left: 500px;">
            <table border="0">
                <tr>
                    <td>Booking date</td>
                    <td><input type="text" name="bookeddate" value=<?php echo $bookingdate;?> readonly></td>
                </tr>
                <tr>
                    <td>Slot Number</td>
                    <td><input type="text" name="slotno" value=<?php echo $slotno;?> readonly></td>
                </tr>
                <tr>
                    <td>From Time</td>
                    <td><input type="text" name="fromtime" id="fromtime" value=<?php echo $time;?> readonly></td>
                </tr>
                <tr>
                    <td>Select Upto</td>
                    <td>
                        <select name="totime" id="totime">
                            <?php
                            $len=count($totimearray);
                            if($len==0)
                            {
                                $s=explode(":",$time);
                                $t=$s[0]+1;
                                $t=$t.":00:00";
                                echo "<option>$t</option>";                                
                            }
                                else
                                {
                                    for($i=0;$i<count($totimearray); $i++)
                                {
                                   
                                      echo "<option>" .$totimearray[$i]["slottime"]."</option>";
                                    
                                   /* else
                                    {
                                        echo "<option>" .$totimearray[$i]["slottime"]."</option>";
                                        break;  
                                    }*/
                                }}
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="book" id="btn" style=" margin-left: 130px;"></td>
                </tr>
            </table>
        </form>
       
        <?php
            include'footer.php'; 
        ?>
    </body>
    <script>
      /*  document.getElementById("totime").addEventListener("focus",function(){

       
        var fromtime=document.getElementById("fromtime").value;
        var totime=document.getElementById("totime").value;
        if(totime<=fromtime)
        {
            document.getElementById("result").innerHTML="To time cannot be less than equal to fromtime";
            document.getElementById("btn").disabled=true;
        }
        else
        document.getElementById("result").innerHTML="";
        {
            document.getElementById("btn").disabled=false;
        }
    });*/
    </script>
</html>
                
                
                
