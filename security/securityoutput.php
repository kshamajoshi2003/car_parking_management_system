<?php
            include'header_link.php';
?>
<?php
             include'header.php';
?>
<!--<div style="display:flex; justify-content: space-around;">
<a href="changepasswordform.php">change password</a>
<a href="addslots.php">Add slots</a>
<a href="selectintimeform.php">update booking</a>
<a href="viewcustomer.php">view customer</a>
<a href="viewslots.php">view slots</a>
<a href="logout.php">logout</a>
</div>-->
<div style=" width:460px; height:150px;  float:left; margin-left:400px;">
<h3>
<?php
    $msg=$_REQUEST["msg"];
    echo $msg;
?>
<a style="padding-left:30px;" href="home.php">click here</a>
</h3>
<?php
            include'footer.php'; 
?>  