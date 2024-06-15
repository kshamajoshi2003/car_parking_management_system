<html>
    <head>
        <title>customer registration form</title>
        <script>
            function validate()
            {
                var textphonepattern=/^[0-9]{10}$/;
                var tphone=document.forms["regform"]["phone"].value;
                if(tphone.search(textphonepattern)==-1)
                {  
                    document.getElementById("phoneresult").innerHTML="Phone number should contain only digits and minimum10";
                    return false;
                }

                /*var regEmail=/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;
                var regEmail=document.forms["regform"]["email"].value;
                if(regEmail.search(regEmail)==-1)
                {
                    document.getElementById("emailresult").innerHTML="email should contain @ and .com";
                    return false;
                }*/
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL))
              {
                $emailErr = "Invalid email format";
              }
              $name = test_input($_POST["name"]);
             if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
             {
                $nameErr = "Only letters and white space allowed";
             }
            }
        </script>
        <style>
            body{
                /* background-color:#ffd9b3; */
                background-image:url("bg6.jpg");
                background-color:rgb(128,128,128);
                background-repeat:no-repeat;
            }
            .tablee,td,tr{
                padding:12px;
                        align:center;
                        /* border: 1px solid black; */
                        color:#293d3d;
                        font-weight:800;
            
                    }
                                                      
                    button:hover {
                        
                        background-color:black;
                        color:#336699;
                        
                    }
                    h4{
                margin-top:3px;
                margin-bottom:3px;
                color:solid black;
                font-size:24px;
                
            }
            input{
                padding:3px 23px 3px 23px;
                border:2px solid #336699;
                border-radius:8px;
            }
            form{
                /* border:2px solid #336699; */
                margin-top:39px;
            }
            

            textarea{
                border:2px solid #336699;
                border-radius:4px;
            }
            table{
                /* border: 1px solid black; */
                margin-bottom:23px;
            }
        </style>
    </head>
    <body>
        <form method="POST" action="reg.php" name="regform" onsubmit="return validate();" style="">
            <h4 align="center">CUSTOMER REGISTRATION FORM</h4>
            <table name="tablee" align="center" style="background-color:rgba(240, 240, 240,0.5);">
                <tr>
<td >

</td>
                </tr>
                <tr>
                    <td style="color:black; font-size:20px;">Name</td>
                    <td><input type="text" name="name" id="name" maxlength="20" minlength="3" required autofocus></td>
                </tr>
                <tr>
                    <td style="color:black; font-size:20px;">Address</td>
                    <td><textarea id="address" name="address" required style="width:210px;"></textarea></td>
                </tr>
                <tr>
                    <td style="color:black; font-size:20px;">Email</td>
                    <td><input type="email" name="email" id="email" required></td>
                </tr>
                <tr>
                    <td style="color:black; font-size:20px;">City</td>
                    <td><input type="text" name="city" id="city" required></td>
                </tr>
                <tr>
                    <td style="color:black; font-size:20px;">Pincode</td>
                    <td><input type="text" name="pincode" id="pincode" maxlength="6" minlength="6" required></td>
                </tr>
                <tr>
                    <td style="color:black; font-size:20px;">Password</td>
                    <td><input type="password" name="newpassword" id="newpassword" maxlength="10" minlength="6" required></td>
                </tr>
                <tr>
                    <td style="color:black; font-size:20px;">confirm password</td>
                    <td><input type="password" name="confirmpassword" id="confirmpassword" maxlength="10" minlength="6" required></td>
                </tr>
                <tr>
                    <td style="color:black; font-size:20px;">Phone</td>
                    <td><input type="phone" name="phone" id="phone" maxlength="10" minlength="10" required></td>
                    <p id="phoneresult" style="color:tomato;"></p>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="submit" name="btn"  id="btn" style="border:2px solid #476b6b; margin-left:2px;font-weight:900; padding: 5px 153px 5px 153px; color:white;background-color:#476b6b; letter-spacing:1px;"></td>
                </tr>
            </table>
            <div class="signin" align="center" style="font-weight:800;color:white;text-decoration:none;">Do have account?
                <a href="loginform.php" style="color:#bfff00;font-size:25px; ">Signin Now</a>
            </div>
            <div id="result">

            </div>
        </form>
        <script>
            document.getElementById("confirmpassword").addEventListener("blur",function(){

                var npassword=document.getElementById("newpassword").value;
                var cpassword=document.getElementById("confirmpassword").value;
                if(npassword!=cpassword)
                {
                    var msg="New password and confirm password do not match";
                    document.getElementById("result").innerHTML=msg;
                    document.getElementById("btn").disabled=true;
                }
                else
                {

                document.getElementById("btn").disabled=false;
                document.getElementById("result").innerHTML="";
                    
                }
            });
            </script>
    </body>
</html>