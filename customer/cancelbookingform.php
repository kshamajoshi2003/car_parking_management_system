<?php
 session_start();
 $customercode=$_SESSION["customercode"];
 $booking_array=array();
 $msg="";

 //1.connect to database
 $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);

 //3.1 $stmt is a prepared statement object
 $stmt=$conn->prepare("select * from booking where customercode=? and status='booked'");
 $stmt->bindParam(1,$customercode);


 //execute
 $status=$stmt->execute();

 //check how many rows are returned
 $c=$stmt->rowCount();
 if($c>0)
 {
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
    array_push($booking_array,$row);
    }
 }
 else
 {
    $msg="No bookings found.....";
    //header("location:customeroutput.php?msg=$msg");
    echo '<script>alert("'.$msg.'")
    location.href = "home.php";
    </script>';
 }
 ?>
<html>
    <head>
        <title>Cancel Booking</title>
        <?php
            include'header_link.php';
        ?>
         <style>
          tr:hover {background-color: rgba(255,255,255,0.5);}
        </style>
    </head>
        <?php
             include'header.php';
        ?>
         <br><hr>
         <body>
               
      <h3 style=' border-radius: 25px;
          border: 2px solid #73AD21;
          padding: 12px;
          width: 300px;
          height: 60px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 500px;
        '>Cancel Booking</h3><br><br>
    <?php
    //find len of array
    $len=count($booking_array);
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
        echo "<br>";
        for($i=0; $i<$len;$i++)
        {
            echo "<tr>";
            $bid=$booking_array[$i]["bookingid"];
            $id=$booking_array[$i]["id"];
            $fromtime=$booking_array[$i]["fromtime"];
            $totime=$booking_array[$i]["totime"];
            $bookeddate=$booking_array[$i]["bookeddate"];
            $slotno=$booking_array[$i]["slotno"];
            echo "<td style=' text-align: center;'><a href=updateslotsheet.php?bookingid=$bid&id=$id&fromtime=$fromtime&totime=$totime&bookeddate=$bookeddate&slotno=$slotno>".$booking_array[$i]["bookingid"]."</td>";
            echo "<td style=' text-align: center;'>".$id=$booking_array[$i]["id"]."</td>";
            echo "<td style=' text-align: center;'>".$booking_array[$i]["slotno"]."</td>";
            echo "<td style=' text-align: center;'>".$booking_array[$i]["customercode"]."</td>";
            echo "<td style=' text-align: center;'>".$booking_array[$i]["bookeddate"]."</td>";
            echo "<td style=' text-align: center;'>".$booking_array[$i]["carno"]."</td>";
            echo "<td style=' text-align: center;'>".$booking_array[$i]["fromtime"]."</td>";
            echo "<td style=' text-align: center;'>".$booking_array[$i]["totime"]."</td>";
            echo "<td style=' text-align: center;'>".$booking_array[$i]["amount"]."</td>";
            echo "<td style=' text-align: center;'>".$booking_array[$i]["securitycode"]."</td>";
            echo "<td style=' text-align: center;'>".$booking_array[$i]["status"]."</td>";
            echo "</tr>";
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