<?php
session_start();
$customercode=0;

//fetch input
$email=$_POST["email"];
$password=$_POST["password"];
$msg="";

//open database connection and check if email and pwd is present in table 
$conn=new PDO("mysql:host=localhost;dbname=parking","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

try{
    $stmt=$conn->prepare("select * from customer where email=? and password=?");
    $stmt->bindParam(1,$email);
    $stmt->bindParam(2,$password);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c==1)
    {
        //store email and pwd in session so that they can be used in other pages
        $_SESSION["email"]=$email;
        $_SESSION["password"]=$password;
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $customercode=$row["customercode"];
        $_SESSION["customercode"]=$customercode;
        header('location:customer/home.php');
    }
    else
    {
        $msg="Invalid login";
    }
  }
catch(Exception $e){
    $msg="Invalid login".$e->getMessage();
    }
?>
<html>
    <head>
        <title>customer login</title>
    </head>
    <body>
        <?php
        echo $msg;
        ?>
    </body>
</html>