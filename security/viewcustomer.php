<?php
 session_start();
 $customer_array=array();
 $msg="";

 //1.connect to database
 $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);

 //3.1 $stmt is a prepared statement object
 $stmt=$conn->prepare("select * from customer");
 
 //executev 
$stmt->execute();

 //check how many rows are returned
 $c=$stmt->rowCount();
 if($c>0)
 {
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
    array_push($customer_array,$row);
    }
 }
 else
 {
    $msg="rows not found";
    header("location:customeroutput.php?msg=$msg");

 }
 ?>

 <html>
    <head>
        <title>customer details </title>
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
         $len=count($customer_array);
         if($len>0)
         {
           echo "<table border=0>";
           echo"<tr style='background-color:red;padding: 200px;border: 2px solid #4CAF50;'>";
           echo "<td style=' text-align: center;'>Customer Code</td>";
           echo "<td style=' text-align: center;'>Name</td>";
           echo "<td style=' text-align: center;'>Address</td>";
           echo "<td style=' text-align: center;'>Email</td>";
           echo "<td style=' text-align: center;'>Phone</td>";
           //echo "<td>gender</td>";
           echo "<td style=' text-align: center;'>City</td>";
           echo "<td style=' text-align: center;'>Pincode</td>";
           //echo "<td>password</td>";
           echo "</tr>";
           for($i=0;$i<$len;$i++)
           {
             echo "<tr>";
             //$custcode=$book_array[$i]["customercode"];    
             echo "<td style=' text-align: center;'>".$customer_array[$i]["customercode"]."</td>";
             echo "<td style=' text-align: center;'>".$customer_array[$i]["name"]."</td>";
            echo "<td style=' text-align: center;'>".$customer_array[$i]["address"]."</td>";
            echo "<td style=' text-align: center;'>".$customer_array[$i]["email"]."</td>";
            echo "<td style=' text-align: center;'>".$customer_array[$i]["phone"]."</td>";
            //echo "<td>".$customer_array[$i]["gender"]."</td>";
            echo "<td style=' text-align: center;'>".$customer_array[$i]["city"]."</td>";
            echo "<td style=' text-align: center;'>".$customer_array[$i]["pincode"]."</td>";
            //echo "<td>".$customer_array[$i]["password"]."</td>";

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
