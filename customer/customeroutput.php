<?php
            include'header_link.php';
?>
<?php
             include'header.php';
?>
<!--<div style="display:flex; justify-content: space-around;">
<a href="changepasswordform.php">change password</a>
<a href="selectdate.php">View slots and book</a>
<a href="cancelbookingform.php">booking cancel</a>
<a href="editprofile.php">Edit Profile</a>
<a href="viewmybooking.php">view my booking</a>
</div>-->
<div style=" width:460px; height:150px;  float:left; margin-left:400px; margin-top:200px;margin-bottom: 200px;">
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