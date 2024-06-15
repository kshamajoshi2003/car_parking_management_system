<?php
 $book_array=array();
 $bookeddate=$_POST["slotdate"];

 //$_SESSION["slotdate"]=$bookeddate;
 $msg="";

 //1.connect to database
 $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);

 //3.1 $stmt is a prepared statement object
 $stmt=$conn->prepare("select * from booking where status<>'cancelled' and  bookeddate=?");
 $stmt->bindParam(1,$bookeddate);


 //execute
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
    //$msg="rows not found";
    $msg="No Bookings found";
    echo '<script>alert("'.$msg.'")
    location.href = "home.php";
    </script>';
    //header("location:securityoutput.php?msg=$msg");

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
      '>Customer Details</h3><br><br>
       <br><br><br>
        <?php
        //find len arr
         $len=count($book_array);
         if($len>0)
         {
           echo "<table border=0>";
           echo"<tr style='background-color:red;padding: 200px;border: 2px solid #4CAF50;'>";
           echo "<td style=' text-align: center;'>bookingid</td>";
           echo "<td style=' text-align: center;'>id</td>";
           echo "<td style=' text-align: center;'>slotno</td>";
           echo "<td style=' text-align: center;'>customercode</td>";
           echo "<td style=' text-align: center;'>bookeddate</td>";
           echo "<td style=' text-align: center;'>fromtime</td>";
           echo "<td style=' text-align: center;'>totime</td>";
           echo "<td style=' text-align: center;'>carno</td>";
           echo "<td style=' text-align: center;'>amount</td>";
           echo "<td style=' text-align: center;'>securitycode</td>";
           echo "<td style=' text-align: center;'>status</td>";
           echo "</tr>";
           for($i=0;$i<$len;$i++)
           {
            echo "<tr>";
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
