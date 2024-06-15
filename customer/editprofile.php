<?php
    //fetch input
    $email=$_POST["email"];
    $customer_array=array();
    $msg="";

    //search
    $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);
    $stmt=$conn->prepare("select * from customer where email=?");
    $stmt->bindParam(1,$email);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0)
    {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($customer_array,$row);
        }
    }
    else
    {
        $msg="row not found";
        header("location:customeroutput.php?msg=$msg");
    }
?>
<html>
    <head>
        <title> edit customer details</title>
        <?php
            include'header_link.php';
        ?>
    </head>
    <body>
        <?php
             include'header.php';
        ?>
        <h3>edit customer details</h3>
        <form method="POST" action="updateprofile.php">
            <table border="1">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" value="<?php echo $customer_array[0]['name'];?>"></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" value="<?php echo $customer_array[0]['address'];?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="<?php echo $customer_array[0]['email'];?>"></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" value="<?php echo $customer_array[0]['phone'];?>"></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" name="city" value="<?php echo $customer_array[0]['city'];?>"></td>
                </tr>
                <tr>
                    <td>Pincode</td>
                    <td><input type="text" name="pincode" value="<?php echo $customer_array[0]['pincode'];?>"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" value="<?php echo $customer_array[0]['password'];?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="update"></td>
                </tr>
            </table>
        </form>
        <?php
            include'footer.php'; 
        ?>
    </body>
</html>