<html>
    <head>
        <title>Select date</title>
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
          padding: 12px;
          width: 300px;
          height: 60px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 500px;
        '>Select Date</h3><br><br><br><hr>
        <form method="POST" action="selectslots.php" style=" margin-left: 500px;">
            <table border="0">
                <tr>
                    <td style="margin: left 10px;">Select Date</td>
                    <td><input type="date" name="slotdate" min="<?= date('Y-m-d'); ?>"></td>
                </tr>
                <tr>
                    <td>Car number</td>
                    <td><input type="text" name="carno" id="carno" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="next" style=" margin-left: 150px;"></td>
                </tr>
            </table>
        </form> 
        <?php
            include'footer.php'; 
        ?>   
    </body>
</html>