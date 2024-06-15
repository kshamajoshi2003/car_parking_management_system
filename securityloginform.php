<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Login</title>
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
    background-image: url("car_img.jpeg");
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

        }
        .header{
            text-align: center;
            padding-top: 75px;
        }
        .header h1
        {
            /* color: rgb(49, 51, 74); */
            color: aliceblue;
            font-size: 31px;
            margin-bottom: 80px;
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
                margin-bottom: 90px;
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
            .fspswd{
                color: white;
                
                padding-top:20px;
                text-decoration:none;
                font-weight:700;
            }
    </style>
</head>

<body>

  
    <div class="container">
        <div class="header">

            <h1 align="center">Security Login Form</h1>

        </div>
        <div class="main">
            
            <form action="securitylogin.php" method="POST">
                    <span>
                        <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="email" name="email" id="email" placeholder="Enter Email"> 
                </span><br>

                    <span>
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Enter your Password">
                    </span><br>
               <button name="Submit" id="Submit">SUBMIT</button><br>
              <span>

                 
              </span>
            </form>
    
</div>
</div>

</body>

</html>