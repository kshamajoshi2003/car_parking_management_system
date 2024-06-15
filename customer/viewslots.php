<?php
/* $slot_array=array();
$msg="";

//1. connect to database
$conn=new PDO("mysql:host=localhost;dbname=parking","root", null);

 //$stmt is a preparedstatement object
 $stmt=$conn->prepare("select * from slot order by slotno");

 //execute
 $stmt->execute();

 //check how many rows are returned
 $c=$stmt->rowCount();
 if($c>0)
 {
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        array_push($slot_array,$row);
    }
 }
 else
 {
    $msg="rows not found";
    header("location:customeroutput.php?msg=$msg");

 }
 ?>
 <html>
    <head>
        <title>Slot details</title>
        <?php
            include'header_link.php';
        ?>
    </head>
    <body>
    <?php
             include'header.php';
     ?>
        <?php
            //find len of array
            $len=count($slot_array);
            if($len>0)
            {
                echo "<table border=1>";
                echo "<tr>";
                echo "<td>slotno</td>";
               
                
                echo "</tr>";
                for($i=0;$i<$len;$i++)
                {
                    echo "<tr>";
                    echo "<td>",$slot_array[$i]["slotno"]."</td>";
                    //echo "<td>",$slot_array[$i]["status"]."</td>";
                     
                    echo "</tr>";
                }
                echo "</table>";
            }            
            echo $msg;
        ?>
         <?php
            include'footer.php'; 
        ?> 
    </body>
</html> */
