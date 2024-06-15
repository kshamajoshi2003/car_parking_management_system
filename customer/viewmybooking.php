<?php
 session_start();
 $book_array=array();
 $customercode=$_SESSION["customercode"];

 
 
 //$_SESSION["slotdate"]=$bookeddate;
 $msg="";

 //1.connect to database
 $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);

 //3.1 $stmt is a prepared statement object
 $stmt=$conn->prepare("select * from booking where customercode=?");
 $stmt->bindParam(1,$customercode);


 //executev 
 $status=$stmt->execute();

 //check how many rows are returned
 $c=$stmt->rowCount();
 if($c>0)
 {
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
    array_push($book_array,$row);
    }
 }
 else
 {
  $msg="No Bookings found";
  echo '<script>alert("'.$msg.'")
  location.href = "home.php";
  </script>';
 }
 ?>

 <html>
    <head>
        <title>booking details</title>
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
      '>Booking Details</h3><br><br>
     
      <?php
        //find len arr
         $len=count($book_array);
         if($len>0)
         {
           echo "<table border=0>";
           echo" <tr style='background-color:red;padding: 200px;border: 2px solid #4CAF50;'> ";
           echo "<td style=' text-align: center;'> Booking Id  </td>";
           echo "<td style=' text-align: center;'> Id </td>";
           echo "<td style=' text-align: center;'> Slot No </td>";
           echo "<td style=' text-align: center;'> Customer Code </td>";
           echo "<td style=' text-align: center;'> Booked Date </td>";
           echo "<td style=' text-align: center;'> From Time </td>";
           echo "<td style=' text-align: center;'> To Time </td>";
           echo "<td style=' text-align: center;'> Car No </td>";
           echo "<td style=' text-align: center;'> Amount </td>";
           echo "<td style=' text-align: center;'> Security Code </td>";
           echo "<td style=' text-align: center;'> Status </td>";
           echo "</tr >";
           echo "<br>";
           for($i=0;$i<$len;$i++)
           {
             echo "<tr>";
             //$custcode=$book_array[$i]["customercode"];    
            echo "<td style=' text-align: center;'>".$book_array[$i]["bookingid"]."</td>";
            echo "<td style=' text-align: center;'>".$book_array[$i]["id"]."</td>";
            echo "<td style=' text-align: center;'>".$book_array[$i]["slotno"]."</td>";
            echo "<td style=' text-align: center;'>".$book_array[$i]["customercode"]."</td>";
            echo "<td style=' text-align: center;'>".$book_array[$i]["bookeddate"]."</td>";
            echo "<td style=' text-align: center;'>".$book_array[$i]["fromtime"]."</td>";
            echo "<td style=' text-align: center;'>".$book_array[$i]["totime"]."</td>";
            echo "<td style=' text-align: center;'>".$book_array[$i]["carno"]."</td>";
            echo "<td style=' text-align: center;'>".$book_array[$i]["amount"]."</td>";
            echo "<td style=' text-align: center;'>".$book_array[$i]["securitycode"]."</td>";
            echo "<td style=' text-align: center;'>".$book_array[$i]["status"]."</td>";
            
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
