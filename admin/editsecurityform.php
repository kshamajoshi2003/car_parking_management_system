<?php
$security_array=array();
$msg="";

//1.connect to database
$conn = new PDO("mysql:host=localhost;dbname=parking", "root", null);    

//2.get all security details to display
$stmt=$conn->prepare("select * from security");
//execute
$stmt->execute();

//check how many rows are returned
$c=$stmt->rowCount();
if($c>0)
{
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        array_push($security_array,$row);
    }
}
else
{
    $msg="Rows not found";
   header("location:adminoutput.php?msg=$msg");
}
?>
<html>
    <head>
        <title>Security details</title>
        <?php
             include'header_link.php';
   ?>
   <style>
          tr:hover {background-color: rgba(255,255,255,0.5);}
        </style>
    </head>
    <body>
         <?php
             include'header.php';
        ?>
           <br><hr>
          <h3 style=' border-radius: 25px;
          border: 2px solid #73AD21;
          padding: 12px;
          width: 300px;
          height: 60px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 500px;
        '>Security Details</h3><br><br>
        <br><br>
        <!--<h2 style="color:#fff;">Security details</h2>-->
        <?php
            //find len of array
            $len=count($security_array);
            if($len>0)
            {
                echo "<table border=0>";
                echo "<tr style='background-color:red;padding: 200px;border: 2px solid #4CAF50;'>";
                echo "<td style=' text-align: center;'>Security Code</td>";
                echo "<td style=' text-align: center;'>Name</td>";
                echo "<td style=' text-align: center;'>Address</td>";
                echo "<td style=' text-align: center;'>Email</td>";
                echo "<td style=' text-align: center;'>Password</td>";
                echo "<td style=' text-align: center;'>Phone</td>";
                echo "</tr>";
                for($i=0;$i<$len;$i++)
                {
                    $a=$security_array[$i]["securitycode"];
                    $b=urlencode($security_array[$i]["name"]);
                    $c=urlencode($security_array[$i]["address"]);
                    $d=urlencode($security_array[$i]["email"]);
                    $e=urlencode($security_array[$i]["password"]);
                    $f=($security_array[$i]["phone"]);
                    echo "<tr>";
                    echo "<td style=' text-align: center;'><a href=editsecurity.php?ic=$a&in=$b&ip=$c&iq=$d&ir=$e&is=$f>$a</a></td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["name"]."</td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["address"]."</td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["email"]."</td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["password"]."</td>";
                    echo "<td style=' text-align: center;'>".$security_array[$i]["phone"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
           //echo $msg;
           
        ?>
        <?php
             include'footer.php';
        ?>
    </body>
</html>