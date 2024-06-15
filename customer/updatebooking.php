<?php
            include'header_link.php';
        ?>
 <?php
             include'header.php';
     ?>
<?php
  session_start();

  //fetch date
  $id=$_SESSION["id"];
  $bookeddate=$_POST["bookeddate"];
  $slotno=$_POST["slotno"];
  $fromtime=$_POST["fromtime"];
  $customercode=$_SESSION["customercode"];
  $carno=$_SESSION["carno"];
  //$id=$_SESSION["id"];
  //$securitycode=$_POST["securitycode"];
  //$amount=$_SESSION["amount"];
  $x=explode(":", $fromtime);
  $ft=$x[0];
  
  $totime=$_POST["totime"];
  $y=explode(":", $totime);
  $tt=$y[0];
  

  $d=0;

  try
  {
    $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stmt=$conn->prepare("insert into booking(bookeddate,carno,customercode,fromtime,totime,slotno,id,securitycode,status) values (?,?,?,?,?,?,?,?,'booked')");
    $stmt->bindParam(1,$bookeddate);
    $stmt->bindParam(2,$carno);
    $stmt->bindParam(3,$customercode);
    $stmt->bindParam(4,$fromtime);
    $stmt->bindParam(5,$totime);
    $stmt->bindParam(6,$slotno);
    $stmt->bindParam(7,$id);
    $stmt->bindParam(8,$securitycode);
    //$stmt->bindParam(8,$amount);
    
    $stmt->execute();
    $c=$stmt->rowCount();

    if($c>0)
    {
      //update slotsheet status as "booked";
      for($i=$ft; $i<$tt; $i++)
      {
        echo $id." ".$slotno." ".$bookeddate."<br>";
        $stmtslotsheet=$conn->prepare("update slotsheet set status='booked' where id=? and slotno=? and slotdate=?");
        $stmtslotsheet->bindParam(1,$id);
        $stmtslotsheet->bindParam(2,$slotno);
        $stmtslotsheet->bindParam(3,$bookeddate);
        $stmtslotsheet->execute();
        $d=$stmtslotsheet->rowCount();

        $id++;

      }
      if($d>0)
      { 
        $msg="Slot Booking Details  Date-".$bookeddate." | Timing-".$fromtime." - ".$totime;
        echo '<script>alert("'.$msg.'")
        location.href = "selecttime.php";
        </script>';
      }
      else
      {
        $msg="booking failed,try again";
        echo '<script>alert("booking failed,try again")
        location.href = "selecttime.php";
        </script>';
      }
    }
    else
    {
         $msg="booking failed,try again";
         

    }
  }
  catch(Exception $e)
  {
    $msg="booking failed,try again, ".$e->getMessage();
    header("location:customeroutput.php?msg=$msg");
  }
  // echo $msg;
?>
 <?php
            include'footer.php'; 
        ?> 