<html>
    <head>
        <title>Select date</title>
        <?php
    include'header_link.php';
    ?>
    <style>
        html {
    position: fixed;
    overflow: auto;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: silver;
}
body {
    height: 100%;
    margin: 0;
    overflow: auto;
    background: aqua;
}

        </style>
    </head>
    <body>
    <?php
    include'header.php';
    ?>
    <!--<div>-->
    <br><hr>
    <h3 style=' border-radius: 25px;
          border: 2px solid #73AD21;
          padding: 12px;
          width: 300px;
          height: 60px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 500px;'>Select Date</h3><br><br><br><hr>
<center> <form method="POST" action="viewslots.php" >
            <table border="0">
                <tr>
                    <td>Select Date</td>
                    <td><input type="date" name="slotdate" id="slotdate"></td>
                </tr>
                <tr>
                  <td colspan="2"><input type="submit" value="next"  style=" margin-left: 150px;"></td>
                </tr>
            </table>
        </form> 
</center>   
    <!--</div>-->
    <?php
    include'footer.php';
    ?>
    </body>
</html>