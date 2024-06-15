<?php
    include'header_link.php';
?>
<?php
    include'header.php';
?>
<?php
//fetch input
$securitycode=$_POST["securitycode"];
$name=$_POST["name"];
$address=$_POST["address"];
$email=$_POST["email"];
$password=$_POST["password"];
$phone=$_POST["phone"];

$msg=" ";

$conn = new PDO("mysql:host=localhost;dbname=parking","root",null);
$stmt=$conn->prepare("update security set name=?,address=?,email=?,password=?,phone=? where securitycode=?");

$stmt->bindParam(1,$name);
$stmt->bindParam(2,$address);
$stmt->bindParam(3,$email);
$stmt->bindParam(4,$password);
$stmt->bindParam(5,$phone);
$stmt->bindParam(6,$securitycode);


$stmt->execute();
$c=$stmt->rowCount();
if($c>0)
{
    $msg="security updated";
    echo '<script>alert("'.$msg.'")
    location.href = "home.php";
    </script>';
}
else
{
    $msg="security update failed";              
    echo '<script>alert("'.$msg.'")
    location.href = "home.php";
    </script>';
    //echo $msg;
   // header("location:adminoutput.php?msg=$msg");
}
?>
<?php
    include'footer.php';
?>