<html>
   <head>
    <title>change password</title>
    <?php
             include'header_link.php';
   ?>
   </head>
   <body style="position:fixed;width:100%;">
        <?php
             include'header.php';
        ?>
          
    <!--<div>-->
        <br><br><br>
        <h3 style=' border-radius: 25px;
          border: 2px solid #73AD21;
          padding: 12px;
          width: 300px;
          height: 60px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 500px;
        '>Change Password</h2><br><br><br><hr>
        <!--<h2 style="color:#fff;">change password</h2>-->
    <form method="POST" action="changepassword.php" style=" margin-left: 400px;">
        <table border="0">
            <tr>
                <td>Current password</td>
                <td><input type="password" name="currentpassword" id="currentpassword"  required autofocus></td>
            </tr>
            <tr>
                <td>New Password</td>
                <td><input type="password" name="newpassword" id="newpassword"  required ></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="confirmpassword" id="confirmpassword"  required ></td>
            </tr>
             <tr>
                <td colspan="2"><input type="submit" value="update"  name="btn" id="btn" disabled style=" margin-left: 150px;"></td>
             </tr>
        </table>
        <div id="result">
        </div>
    </form>
    <!--</div>-->
    <?php
             include'footer.php';
        ?>
        <script>
            document.getElementById("confirmpassword").addEventListener("blur",function(){
                var cupassword=document.getElementById("currentpassword").value;
                var npassword=document.getElementById("newpassword").value;
                var cpassword=document.getElementById("confirmpassword").value;
                
                if(cupassword==npassword)
                {
                    var msg="current and new password should not be same";
                    document.getElementById("result").innerHTML=msg;
                    document.getElementById("btn").disabled=true;
                   
                }
                else if(npassword!=cpassword)
                {
                    var msg="new password and confirm password do not match";
                    document.getElementById("result").innerHTML=msg;
                    document.getElementById("btn").disabled=true;
                   
                }
                else
                {
                    document.getElementById("result").innerHTML="";
                    document.getElementById("btn").disabled=false;
                }
            });

      </script>
    </body>
</html>