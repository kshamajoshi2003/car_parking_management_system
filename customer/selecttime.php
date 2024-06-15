<?php
session_start();
$slotdate=$_SESSION["slotdate"];
$carno=$_SESSION["carno"];
$h=date("h");
$slotsheetarray=array();
$msg="";
try{
    $conn = new PDO("mysql:host=localhost;dbname=parking","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stmt=$conn->prepare("select * from slotsheet where slotdate=?");
    $stmt->bindParam(1,$slotdate);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0)
    {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($slotsheetarray,$row);
        }

    }
    else
    {
        $msg="No slots found";
        header("location:customeroutput.php?msg=$msg");

    }
}
catch(Exception $e)
{
    $msg="No slots found".$e->getMessage();
}
?>
<html>
    <head>
        <title>booking</title>
        <?php
            include'header_link.php';
        ?>
        </head>
        <body>
        <?php
             include'header_slot.php';
        ?>
            <?php
                $len=Count($slotsheetarray);
                echo "<div>";
                echo "<table border=1>";
                echo "<tr><td colspan=10>slot sheet for date: $slotdate</td></tr>";
                for($i=0; $i<$len; $i++)
                {
                    
                    echo "<tr >";
                    for($j=1;$j<=10 && $i<$len;$j++,$i++)
                    {
                        echo "<td>";
                       echo "<hr >";
                        echo "Slot:".$slotsheetarray[$i]["slotno"];
                        echo "<br>";
                        echo "Time:".$slotsheetarray[$i]["slottime"];
                        echo "<br>";

                        if($slotsheetarray[$i]["status"]=="Available")
                        {
                           
                            $id=$slotsheetarray[$i]["id"];
                            $time=$slotsheetarray[$i]["slottime"];
                            $slotno=$slotsheetarray[$i]["slotno"];
                            echo "<font color=green>".$slotsheetarray[$i]["status"]."</font>";
                            echo "<br>";
                            echo "<a href=book.php?id=$id&slotno=$slotno&time=$time>Book this</a>";
                        }
                        else
                        {
                            echo "<font color=red>".$slotsheetarray[$i]["status"]."</font>";
                            echo "<br>";
                            echo "<br>";
                        }
                        echo "</td>";
                        
                    }
                    echo "</tr>";
                    $i--;
                }
                echo "</table>";
                echo "</div>";
            ?>
             <?php
            include'footer.php'; 
        ?> 
        </body>
</html>