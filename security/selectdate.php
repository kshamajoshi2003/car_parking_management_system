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
        ?><br><hr>
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
        <form method="POST" action="viewbooking.php" style=" margin-left: 500px;">
            <table border="0">
                <tr>
                    <td>Select Date</td>
                    <td><input type="date" name="slotdate" min="<?= date('Y-m-d'); ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" style=" margin-left: 130px;"></td>
                </tr>
            </table>
        </form>  
        <?php
             include'footer.php';
        ?>  
    </body>
</html>