
<html>
   <head>
    <title>add slotes</title>
    <?php
            include'header_link.php';
        ?>
   </head>
   <body style="position:fixed;width:100%;">
   <?php
             include'header.php';
        ?>
        <?php
        $slotno=0;
        $conn = new PDO("mysql:host=localhost;dbname=parking", "root", null);  
        $stmt=$conn->prepare("select max(slotno) as maxslotno from slot");
        $stmt->execute();
        $c=$stmt->rowCount();
        if($c>0)
        {
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $slotno=$row["maxslotno"]+1;
        }
        else
        {
            $slotno=1;

        }
        
        ?>
   <!--<div>--><br><hr>
   <h3 style=' border-radius: 25px;
          border: 2px solid #73AD21;
          padding: 12px;
          width: 300px;
          height: 60px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 500px;
      '>Add slots</h3><br><br><br><hr>
    <form method="POST" action="addslot.php" style=" margin-left: 500px;">
        <table border="0">
            <tr>
                <td>From Slot</td>
                <td><input type="number" name="fromslot" id="number" value=<?php echo $slotno;?> readonly></td>
            </tr>
            <tr>
                <td>To Slot</td>
                <td><input type="number" name="toslot" id="number" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="next" name="btn" id="btn" style="margin-left: 150px;"></td>
             </tr>
        </table>
    </form>
</div>
<?php
            include'footer.php'; 
        ?>   
    </body>
</html>
