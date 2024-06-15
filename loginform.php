<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="style.css">  -->

    <style>
        @keyframes pan{100%{background-position: 15% 50%;}}

body{
    font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    display: grid;
    place-items:center;
    margin: 0;
    padding: 0 24px;
    background-image: url("img6.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
    animation: pan 6s infinite alternate linear;
}

@media(width >= 500px){
    body{
        padding: 0;
    }
}


        .container{
            width: 380px;
            margin:7% auto;
            border-radius: 25px;
            background-color: rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 18px rgb(150, 148, 148);
                height:540px;

        }
        .header{
            text-align: center;
            padding-top: 45px;
        }
        .header h1
        {
            /* color: rgb(49, 51, 74); */
            color: aliceblue;
            font-size: 31px;
            margin-bottom: 60px;
        }
        .main{
            text-align: center;
        }
        .main input, button{
            width: 300px;
            height: 40px;
            border: none;
            outline: none;
            padding-left: 40px;
            box-sizing: border-box;
            font-size: 15px;
            color: #333;
            margin-bottom: 40px;
            border-radius: 6px;
            box-shadow: 2px 2px 5px #333;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            
        }
            .main button{
                padding-left: 0;
                background-color: #83acf1;
                letter-spacing: 1px;
                font-weight: bold;
                margin-bottom: 7px;
                color:rgb(242, 242, 243);
                
            }
            .main button:hover {
                box-shadow: 2px 2px 5px #555;
                background-color: #7799d4;
            }
            .main input:hover {
                box-shadow: 2px 2px 5px #555;
                background-color: #ddd;
            }
            .main span
            {
                position: relative;
            }
            .main i{
                position: absolute;
                left: 15px;
                color: #333;
                font-size: 16px;
                top: 2px;
            }
    </style>
</head>

<body style="position:fixed;width:100%;">

  
    <div class="container">
        <div class="header">

            <h1 align="center">Login Form</h1>

        </div>
        <div class="main">
            <form action="login.php" method="POST">
                    <span>
                        <i class="fa fa-user" aria-hidden="true"></i>
                    <input name="email" id="email" placeholder="Enter your Email"> 
                </span><br>

                    <span>
                        <i class="fa fa-lock"></i>
                        <input input type="password" name="password" id="password" placeholder="Enter your Password">
                    </span><br>
               <button name="Submit" id="Submit">SUBMIT</button><br>
            </form>
            <a href="forgotpasswordform.php" name="fpswd" style="color: white; font-weight: 800; padding-top:33px;display:block">Forgot Password?</a> 
            <!--<a href="forgotpasswordform.php" name="fpswd" style="color: white; font-weight: 800; padding-top:33px;display:block">Forgot Password?</a> -->
            <br>
            <div class="signup" align="center" style="font-weight:800;color:white;text-decoration:none;">Don't have an account?
                <br>Want to be a new customer<br><a href="regform.php"  style="color:#83acf1;">Signup Now</a>
</div>
</div>
<h1></h1>
</body>

</html>