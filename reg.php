<?php

  //fetch input
  $name=$_POST["name"];
  $address=$_POST["address"];
  $email=$_POST["email"];
  $phone=$_POST["phone"];
  //$gender=$_POST["gender"];
  $city=$_POST["city"];
  $pincode=$_POST["pincode"];
  $password=$_POST["newpassword"];
  
  
  $msg="";

  //connect to database
  $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);

  //build sal statement

  //3.1 $stmt is a prepared statement object
  $stmt=$conn->prepare("insert into customer (name,address,email,city,pincode,password,phone) values(?,?,?,?,?,?,?)");
  $stmt->bindParam(1,$name);
  $stmt->bindParam(2,$address);
  $stmt->bindParam(3,$email);
  //$stmt->bindParam(5,$gender);
  $stmt->bindParam(4,$city);
  $stmt->bindParam(5,$pincode);
  $stmt->bindParam(6,$password);
  $stmt->bindParam(7,$phone);

  //4.execute the sql statements
   $status=$stmt->execute();
   if($status==1)
   {
      $msg="registration successful";
      echo '<script>alert("'.$msg.'")
    location.href = "loginform.php";
    </script>';
   }
    else
      $msg="registration failed.....try again";
      echo '<script>alert("'.$msg.'")
      location.href = "loginform.php";
      </script>';


      echo $msg;
?>



  