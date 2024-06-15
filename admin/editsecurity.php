<?php
    //get url parameters
    $securitycode=$_REQUEST["ic"];
    $name=urldecode($_REQUEST["in"]);
    $address=urldecode($_REQUEST["ip"]);
    $email=urldecode($_REQUEST["iq"]);
    $password=urldecode($_REQUEST["ir"]);
    $phone=$_REQUEST["is"];
?>
<html>
    <head>
        <title>Edit</title>
        <?php
             include'header_link.php';
   ?>
    </head>
    <body>
    <?php
             include'header.php';
        ?>
      <!--  <div>-->
      <h3 style=' border-radius: 25px;
          border: 2px solid #73AD21;
          padding: 12px;
          width: 300px;
          height: 60px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 500px;
        '>Edit Security</h2><br><br><br><hr>
        <form method="POST" action="updatesecurity.php" style=" margin-left: 500px;">
            <table border="0">
                <tr>
                    <td>Security code</td>
                    <td><input type="text" name="securitycode" value="<?php echo $securitycode;?>"readonly></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" value="<?php echo $name;?>" autofocus required></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" value="<?php echo $address;?>"required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="<?php echo $email;?>"required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" value="<?php echo $password;?>"required></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" value="<?php echo $phone;?>"required></td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" value="update"  style=" margin-left: 150px;"></td>
                </tr>
</table>
</form>
</div>
<?php
             include'footer.php';
        ?>
</body>
</html>