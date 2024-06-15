<?php
    session_start();
    //get url parameters
    $bookingid=$_REQUEST["bookingid"];
    $fromtime=urldecode($_REQUEST["fromtime"]);
    $totime=urldecode($_REQUEST["totime"]);
    $_SESSION["bookedouttime"]=$totime;
    $bookeddate=$_REQUEST["bookeddate"];
    $slotno=$_REQUEST["slotno"];
    $status=$_REQUEST["status"];
?>
<html>
    <head>
        <title>Edit</title>
        <?php
             include'header_link.php';
   ?>
    </head>
    <body style="position:fixed;width:100%;">
    <?php
             include'header.php';
        ?>
           <h3 style=' border-radius: 25px;
          border: 2px solid #73AD21;
          padding: 10px;
          width: 300;
          height: 60px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 500px;
          margin-top:10px;
        '>Update Details</h3><br><br><br><hr>

        <form method="POST" action="updatein.php" style=" margin-left: 400px;">
            <table border="0">
            <tr>
                    <td>Slotno</td>
                    <td><input type="text" name="slotno" value="<?php echo $slotno;?>" readonly></td>
                </tr>
                
                <tr>
                    <td>Bookingid</td>
                    <td><input type="text" name="bookingid" value="<?php echo $bookingid;?>" readonly></td>
                </tr>
                <tr>
                    <td>Booked date</td>
                    <td><input type="text" name="bookeddate" value="<?php echo $bookeddate;?>" readonly></td>
                </tr>
                
                <tr>
                    <td>status</td>
                    <?php 
                        if($status=="booked")
                        {
                            echo "<td><select name=status>";
                            echo "<option>in</option>";
                            echo "<option>absent</option>";
                            echo "</select></td>";
                        }
                        else if ($status=="in")
                        {
                            echo "<td><select name=status>";                            
                            echo "<option>out</option>";
                            echo "</select></td>";
                        }
                    ?>
                    
                </tr>   
                <tr>
                    <td>fromtime</td>
                    <td><input type="text" name="fromtime" value="<?php echo $fromtime;?>"readonly></td>
                </tr>
                <tr>
                    <td>totime</td>
                    <td><input type="time" name="totime" value="<?php echo $totime;?>"></td>
                </tr>        
                <tr>
                    <td colspan="2"><input type="submit" value="submit" style=" margin-left: 150px;"></td>
                </tr>
</table>
</form>
<?php
             include'footer.php';
        ?>
</body>
</html>