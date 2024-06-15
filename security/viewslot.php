<?php
session_start();
//get date
$slotdate=$_POST["slotdate"];
$_SESSION["slotdate"]=$slotdate;
//$carno=$_POST["carno"];
//$_SESSION["carno"]=$carno;
$id=$_post["id"];
$_SESSION["id"]=$id;
$msg="";
$slotsheetarray=array();

//set time zone to india
date_default_timezone_set("Asia/Kolkata");
$today=date("Y/m/d");

//get hours from current time
$h=date("h");

//get all slots available for this date
try{
$conn=new PDO("mysql:host=localhost;dbname=parking","root", null);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt=$conn->prepare("select * from slotsheet where slotdate=?");
$stmt->bindparam(1,$slotdate);
$stmt->execute();
$c=$stmt->rowCount();
 if($c>0)
 {
    //goto nextpage
    header('location:selecttime.php');
 }
 else
 {
   //get all slotno from slot table and put in array
   $slotnoarray=array();
   $stmtslot=$conn->prepare("select slotno from slot");
   $stmtslot->execute();
   while($row=$stmtslot->fetch(PDO::FETCH_ASSOC))
   {
    array_push($slotnoarray,$row);
   }
 //create slotsheet for that entire day with status as available
 //slottime array
  $slottimearray=array();
 for($i=5;$i<23;$i++)
 {
    array_push($slottimearray,$i);
 }
 $stmtcreate=$conn->prepare("insert into slotsheet(slotno, slotdate, slottime, status)values(?,?,?,'Available')");
 for($i=0; $i<count($slotnoarray);$i++)
 {
    for($j=0; $j<count($slottimearray);$j++)
    {
        $stmtcreate->bindparam(1,$slotnoarray[$i]["slotno"]);
        $stmtcreate->bindparam(2,$slotdate);
        $slt=$slottimearray[$j];
        if ($slt<10)
         $hh="0".$slottimearray[$j].":00:00";
        else
         $hh=$slottimearray[$j].":00:00";
        $stmtcreate->bindparam(3,$hh);
        $stmtcreate->execute();
    }
 }
header('location:selecttime.php');
}
}
catch(Exception $e)
{
    $msg="Error".$e->getMessage();
    header("location:customeroutput.php?msg=$msg");
}
?>
 