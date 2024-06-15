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
    $city=$_POST["city"];
    $pincode=$_POST["pincode"];
    $password=$_POST["password"];

    $msg="";

    //update old with new 
    $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);
    $stmt=$conn->prepare("update customer set name=?,address=?,phone=?,city=?,pincode=?,password=? where email=?");
    $stmt->bindParam(1,$name);
    $stmt->bindParam(2,$address);
    $stmt->bindParam(3,$phone);
    $stmt->bindParam(4,$city);
    $stmt->bindParam(5,$pincode);
    $stmt->bindParam(6,$password);
    $stmt->bindParam(7,$email);

    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0)
        $msg="Updated";
    else
        $msg="update failed ";
    echo $msg;
    header("location:customeroutput.php?msg=$msg");

?>
  <?php
            include'footer.php'; 
        ?> 