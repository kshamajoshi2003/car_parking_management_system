<?php
            include'header_link.php';
        ?>
  <?php
             include'header.php';
        ?>    
<?php
//update cancellation
    session_start();
    $bookingid=$_REQUEST["bookingid"];
    $id=$_REQUEST["id"];
    $bookeddate=$_REQUEST["bookeddate"];
    $fromtime=$_REQUEST["fromtime"];
    $totime=$_REQUEST["totime"];
    $slotno=$_REQUEST["slotno"];
    $msg="";
    $t="";

    $x=explode(":", $fromtime);
    $ft=$x[0];
  

    $y=explode(":", $totime);
    $tt=$y[0];

    $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);
  
    for($i=$ft; $i<=$tt; $i++)
    {
      $i=(int)$i;
      if($i==9 ||$i==5 || $i==6 ||$i==7 || $i==8)
        $t="0".$i.":00:00";
      else
        $t=$i.":00:00";
    
    $stmt=$conn->prepare("update slotsheet set status='Available' where slotno=? and slotdate=? and slottime=? and status='Booked'");
    $stmt->bindParam(1,$slotno);
    $stmt->bindParam(2,$bookeddate);
    $stmt->bindParam(3,$t);
    
    $stmt->execute();
    }
    $stmt1=$conn->prepare("update booking set status='cancelled' where bookingid=?");
    $stmt1->bindParam(1,$bookingid);
    $c=$stmt1->execute();
    if($c==1)
    {  //echo "<script>alert('Do you want to cancel booking');</script>";
      //$msg="booking cancelled";
      $msg="Your Booking has been cancelled ";
      echo '<script>alert("'.$msg.'")
      location.href = "cancelbookingform.php";
      </script>';
    }
    else
    {
   // $msg="booking cancel failed";
    $msg="Booking cancel failed";
    echo '<script>alert("'.$msg.'")
    location.href = "cancelbookingform.php";
    </script>';
    }
    //echo $msg;
   //header("location:customeroutput.php?msg=$msg");
    ?>
      <?php
            include'footer.php'; 
        ?>
      </body>