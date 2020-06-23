<?php
session_start();
include("conn.php");
$user = $_SESSION['DisplayName'];
$liked=$_GET['liked'];
$qid=$_GET['qid'];
$sn=$_GET['sn'];

if($liked=="false"){
    $sql="DELETE FROM alikes WHERE DisplayName='$user' AND AID='$sn'";
    $sql3 = "UPDATE answer SET AVotes=AVotes-1 WHERE SN=$sn";

    mysqli_query($conn,$sql);
    mysqli_query($conn,$sql3);

}
else{
    $sql="INSERT INTO alikes(DisplayName,AID) VALUES('$user','$sn')";
    $sql2 = "UPDATE answer SET AVotes=AVotes+1 WHERE SN=$sn";

    mysqli_query($conn,$sql);
    mysqli_query($conn,$sql2);
}
header("location:qdetailsn.php?details=".$qid);
?>