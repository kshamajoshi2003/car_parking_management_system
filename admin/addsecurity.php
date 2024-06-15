<?php
    include'header_link.php';
    ?>
    <?php
    include'header.php';
    ?>
<?php

  //fetch input
  $name=$_POST["name"];
  $address=$_POST["address"];
  $email=$_POST["email"];
  $phone=$_POST["phone"];
  $password=$_POST["password"];
  
  
  $msg="";

  //connect to database
  $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);

  //build sal statement

  //3.1 $stmt is a prepared statement object
  $stmt=$conn->prepare("insert into security(name,address,email,phone,password) values(?,?,?,?,?)");
  $stmt->bindParam(1,$name);
  $stmt->bindParam(2,$address);
  $stmt->bindParam(3,$email);
  $stmt->bindParam(4,$phone);
  $stmt->bindParam(5,$password);
  

  //4.execute the sql statements
   $status=$stmt->execute();
   if($status==1)
    {  $msg="Security added successfully....";
      echo '<script>alert("'.$msg.'")
      location.href = "home.php";
      </script>';
    }
    else
    {
      //$msg="registration failed";
      $msg="Registration failed...try again";
      echo '<script>alert("'.$msg.'")
      location.href = "home.php";
      </script>';
    }
      //echo $msg;
      //header("location:adminoutput.php?msg=$msg");
?>
 <?php
    include'footer.php';
    ?>
