<?php
         include'header_link.php';
   ?>
    <?php
        include'header.php';
     ?>
<?php
session_start();
//fetch input
$slotno=$_POST["slotno"];
$status=$_POST["status"];
$bookingid=$_POST["bookingid"];
$securitycode=$_SESSION["securitycode"];
$bookeddate=$_POST["bookeddate"];

$fromtime=$_POST["fromtime"];
$strfromtime=strtotime($_POST["fromtime"]);
$totime=$_POST["totime"];
$strtotime=strtotime($_POST["totime"]);
$amount=50/60;

//minutes
$diff=($strtotime-$strfromtime)/60;
$amount=$diff*$amount;

$msg="";
$c=0;
$d=0;
$e=0;
$conn=new PDO("mysql:host=localhost;dbname=parking","root",null);
if($status=='in')
{
    $stmt=$conn->prepare("update booking set status=?,securitycode=? where bookingid=?");
    $stmt->bindParam(1,$status);
    $stmt->bindParam(2,$securitycode);
    $stmt->bindParam(3,$bookingid);
    $stmt->execute();
    $c=$stmt->rowCount();
    if ($c>0)
    {
        $msg="successfully Updated.......";
        echo '<script>alert("'.$msg.'")
        location.href = "home.php";
        </script>';
    }
     
    else
    {
        $msg="In timings update failed......";
        echo '<script>alert("'.$msg.'")
        location.href = "home.php";
        </script>';
    }
      
}
//out
else if($status=='out')
{
  //$fromtime is the in time
  //$bookedouttime is the booked outtime
  //$actualouttime is when car is out

   
    $actualouttime=$totime;
    $bookedouttime=$_SESSION["bookedouttime"];

    $stmt=$conn->prepare("update booking set status=?, securitycode=?, amount=?, totime=? where bookingid=? and status='in'");
    $stmt->bindParam(1,$status);
    $stmt->bindParam(2,$securitycode);
    $stmt->bindParam(3,$amount);
    $stmt->bindParam(4,$totime);
    $stmt->bindParam(5,$bookingid);
    $stmt->execute();
    $c=$stmt->rowCount();

    
    $yy=explode(":", $totime);
    $tt2=$yy[0];
    $xx=explode(":", $bookedouttime);
    $ft2=$xx[0];
     
    for($i=$tt2; $i<=$ft2; $i++)
    {
      $i=(int)$i;
      if($i==9 ||$i==5 || $i==6 ||$i==7 || $i==8)
        $t="0".$i.":00:00";
      else
        $t=$i.":00:00";
     $stmt1=$conn->prepare("update slotsheet set status='Available' where slotno=? and slotdate=? and slottime=? and status='booked'");
    $stmt1->bindParam(1,$slotno);
    $stmt1->bindParam(2,$bookeddate);
    $stmt1->bindParam(3,$t);
    
    $stmt1->execute();
    $d=$stmt1->rowCount();
    }
    
    
         $msg="Out details updated ,amount= Rs".$amount;
         echo '<script>alert("'.$msg.'")
        location.href = "home.php";
        </script>';

}
//absent
else{
    $stmt=$conn->prepare("update booking set status=?, securitycode=? where bookingid=? and status='booked'");
    $stmt->bindParam(1,$status);
    $stmt->bindParam(2,$securitycode);
    $stmt->bindParam(3,$bookingid);
    $stmt->execute();
    $c=$stmt->rowCount();
    $amount=0;

        
    $a=explode(":", $fromtime);
    $ft1=$a[0];
    $b=explode(":", $totime);
    $tt1=$b[0];
   $t="";
    for($i=$ft1+1; $i<=$tt1; $i++)
    {
      $i=(int)$i;
      if($i==9 ||$i==5 || $i==6 ||$i==7 || $i==8)
        $t="0".$i.":00:00";
      else
        $t=$i.":00:00";
    
      
    $stmt1=$conn->prepare("update slotsheet set status='Available' where slotno=? and slotdate=? and slottime=? and status='booked'");
    $stmt1->bindParam(1,$slotno);
    $stmt1->bindParam(2,$bookeddate);
    $stmt1->bindParam(3,$t);
    
    $stmt1->execute();
    }
             //$msg="vehicle updated";  
             $msg="Updated.......";
             echo '<script>alert("'.$msg.'")
             location.href = "home.php";
             </script>';
}
//header("location:securityoutput.php?msg=$msg");



?>
<?php
        include'footer.php';
?>