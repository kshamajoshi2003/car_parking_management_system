<?php
            include'header_link.php';
        ?>
        <?php
             include'header.php';
        ?>
<?php
  
  $from=$_POST["fromslot"];
  $to=$_POST["toslot"];
    
  $msg="";

  //connect to database
  $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $stmt=$conn->prepare("insert into slot(slotno) values(?)");
  for($i=$from; $i<=$to; $i++)
  {

    
    $stmt->bindParam(1,$i);
    $stmt->execute();
  }
  
   $c=$stmt->rowCount();
   if($c>0)
   {
    $msg="slot added successfully";
    echo '<script>alert("'.$msg.'")
  location.href = "home.php";
  </script>';
   }
  else
  {
      $msg="slot not added";
      echo '<script>alert("'.$msg.'")
      location.href = "home.php";
      </script>';
      //header("location:customeroutput.php?msg=$msg");
  }
?>
<?php
            include'footer.php'; 
        ?>   