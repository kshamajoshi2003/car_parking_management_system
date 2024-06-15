<?php
            include'header_link.php';
?>
<?php
             include'header.php';
?>
<?php
//session start
session_start();
$msg="";

//fetch input
$currentpassword=$_POST["currentpassword"];
$newpassword=$_POST["newpassword"];
$confirmpassword=$_POST["confirmpassword"];

//compare session password==current password and newpassword==confirmpassword
if($currentpassword==$_SESSION["password"])
{
    if($newpassword==$confirmpassword)
    {
        //connect to db and update new password in admintable
        $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        try{
            //update session password with newpassword
            $stmt=$conn->prepare("update security set password=? where email=?");
            $stmt->bindParam(1,$newpassword);
            $stmt->bindParam(2,$_SESSION["email"]);
            $stmt->execute();
            $c=$stmt->rowCount();
           if($c==1) 
           {
            //update session password with newpassword
            $_SESSION["password"]=$newpassword;
            $msg="password updated successfully";
             echo '<script>alert("'.$msg.'")
            location.href = "home.php";
            </script>';
           }
           else
           {
            $msg="update password failed";
             echo '<script>alert("'.$msg.'")
            location.href = "home.php";
            </script>';
           }
           }
        catch(Exception $e)
        {
            $msg="update failed".$e->getMessage();
        }
    }
    else
    {
      $msg="new and confirm password do not match";
    }
}
else
{
       $msg="current password is invalid........try again";
        echo '<script>alert("'.$msg.'")
            location.href = "changepasswordform.php";
            </script>';
       //header("location:securityoutput.php?msg=$msg");
}

//if yes,
   //connect to db and update new password in admintable
   //update session password with newpassword
//else
   //error message
?>
<?php
            include'footer.php'; 
?>   

