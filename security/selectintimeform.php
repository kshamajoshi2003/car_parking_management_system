<?php
$security_array=array();
$msg="";
date_default_timezone_set("Asia/Kolkata");
$today=date("Y/m/d");

//1.connect to database
$conn = new PDO("mysql:host=localhost;dbname=parking", "root", null);    

//2.get all security details to display
$stmt=$conn->prepare("select * from booking where bookeddate=?");
$stmt->bindParam(1,$today);
//execute
$stmt->execute();

//check how many rows are returned
$c=$stmt->rowCount();
if($c>0)
{
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        array_push($security_array,$row);
    }
}
else
{
    $msg="No Bookings found......";
    //header("location:securityoutput.php?msg=$msg");
    echo '<script>alert("'.$msg.'")
    location.href = "home.php";
    </script>';
}
?>
<html>
    <head>
        <title>Booking details</title>
        <?php
             include'header_link.php';
   ?>
    <style>
          tr:hover {background-color: rgba(255,255,255,0.3);}
        </style>
    </head>
    <body>
    <?php
             include'header.php';
        ?>
        <br><hr>
        <h3 style=' border-radius: 25px;
          border: 2px solid #73AD21;
          padding: 12px;
          width: 300px;
          height: 60px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 500px;
      '>Booking Details</h3><br><br><br><hr>
        <!--<h2 style="color:#fff;">Booking details</h2><br>-->
        <?php
            //find len of array
            $len=count($security_array);
            if($len>0)
            {
                echo "<table border=0>";
                echo "<tr style='background-color:red;padding: 200px;border: 2px solid #4CAF50;'>";
                echo "<td style=' text-align: center;'>Booking Id</td>";
                echo "<td style=' text-align: center;'>Id</td>";
                echo "<td style=' text-align: center;'>Slot No</td>";
                echo "<td style=' text-align: center;'>Customer Code</td>";
                echo "<td style=' text-align: center;'>Booked Date</td>";
                echo "<td style=' text-align: center;'>Car No</td>";
                echo "<td style=' text-align: center;'>From Time</td>";
                echo "<td style=' text-align: center;'>To Time</td>";
                echo "<td style=' text-align: center;'>Amount</td>";
                echo "<td style=' text-align: center;'>Security Code</td>";
                echo "<td style=' text-align: center;'>Status</td>";
                echo "</tr>";
                for($i=0;$i<$len;$i++)
                {
                    $a=$security_array[$i]["bookingid"];
                    $b=urlencode($security_array[$i]["fromtime"]);
                    $c=urlencode($security_array[$i]["totime"]);
                    $bookeddate=$security_array[$i]["bookeddate"];
                    $slotno=$security_array[$i]["slotno"];
                    $status=$security_array[$i]["status"];
                    echo "<tr>";
                    if ($status=="cancelled" || $status=="absent" || $status=="out")
                        echo "<td>$a</td>";
                    else 
                    echo "<td style=' text-align: center;'><a href=updateintimeform.php?bookingid=$a&fromtime=$b&totime=$c&bookeddate=$bookeddate&slotno=$slotno&status=$status>$a</a></td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["id"]."</td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["slotno"]."</td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["customercode"]."</td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["bookeddate"]."</td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["carno"]."</td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["fromtime"]."</td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["totime"]."</td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["amount"]."</td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["securitycode"]."</td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["status"]."</td>";
                }
                echo "</table>";
            }
           echo $msg;
        ?>
        <?php
             include'footer.php';
        ?>
    </body>
</html>