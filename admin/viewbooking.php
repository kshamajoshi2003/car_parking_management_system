<?php
 $book_array=array();
 $bookeddate=$_POST["slotdate"];
 //$_SESSION["slotdate"]=$bookeddate;
 $msg="";

 //1.connect to database
 $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);

 //3.1 $stmt is a prepared statement object
 $stmt=$conn->prepare("select * from booking where bookeddate=?");
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
    //header("location:adminoutput.php?msg=$msg");
    $msg="No Bookings found";
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
          tr:hover {background-color: rgba(255,255,255,0.5);}
          div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
    }
        </style>
        <script>
          $(document).ready(function () {
    $('#example').DataTable({
        scrollY: 200,
        scrollX: true,
    });
});
</script>
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
         <!--<h2 style="color:tomato;">Booking details</h2>-->
   
      <?php
        //find len arr
         $len=count($book_array);
         if($len>0)
         {
          
           echo "<table id='example' class='display nowrap' style='width:100%'>";
           echo"<tr style='background-color:red;padding: 200px;border: 2px solid #4CAF50;'>";
           echo "<td style=' text-align: center;'>Booking Id</td>";
           echo "<td style=' text-align: center;'>Slot No</td>";
           echo "<td style=' text-align: center;'>Customer Code</td>";
           echo "<td style=' text-align: center;'>Booked Date</td>";
           echo "<td style=' text-align: center;'>From Time</td>";
           echo "<td style=' text-align: center;'>To Time</td>";
           echo "<td style=' text-align: center;'>Car No</td>";
           echo "<td style=' text-align: center;'>Amount</td>";
           echo "<td style=' text-align: center;'>Security Code</td>";
           echo "<td style=' text-align: center;'>Status</td>";
           echo "</tr>";
           echo "<br>";
           for($i=0;$i<$len;$i++)
           {
            echo "<tr>";
            echo "<td style=' text-align: center;'>".$book_array[$i]["bookingid"]."</td>";
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
         
         
      ?>
         <?php
             include'footer.php';
        ?>
  </body>
</html>
