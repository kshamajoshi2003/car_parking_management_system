<?php
//eytikmqixfjxquby
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

    $to=$_POST["emailid"];
    $conn=new PDO("mysql:host=localhost;dbname=parking","root",null);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt=$conn->prepare("select password from customer where email=?");
        $stmt->bindParam(1,$to);
        $stmt->execute();
        $r=$stmt->rowCount();

        if($r==1)
        {
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $password=$row["password"];
            $mail=new PHPMailer(true);
            $mail->isSMTP();

            $mail->Host='smtp.gmail.com';
            $mail->Port=465;

            $mail->Password='eytikmqixfjxquby';
            $mail->SMTPSecure='ssl';
            $mail->SMTPAuth=true;
        
        //sender info
        $mail->Username='deepajkadam1234@gmail.com';
        $mail->setFrom('deepajkadam1234@gmail.com');

        //Add a recipent
        $mail->addAddress($to);

        //Set email format to HTML
        $mail->isHTML(true);
        
        //Mail subject
        $mail->subject='Email from Localhost';

        //Mail body content
        $bodyContent='<h1>Forgot password</h1>';
        $bodyContent.='<p>Your password is ' .$password.'</p>';
        $mail->Body = $bodyContent;

        //send email
        if(!$mail->send())
        {
            //echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
            $msg="'Message could not be sent. Mailer Error: '.$mail->ErrorInfo";
            echo '<script>alert("'.$msg.'")
            location.href = "forgotpasswordform.php";
            </script>';
        }
        else{
            //echo 'Message has been sent.';
            $msg="Message has been sent to your email";
            echo '<script>alert("'.$msg.'")
            location.href = "customerloginform.php";
            </script>';
        }
    }
    else
    {
       // echo "No such emailid";
       $msg="No such email id";
       echo '<script>alert("'.$msg.'")
       location.href = "forgotpasswordform.php";
       </script>';
    }
?> 