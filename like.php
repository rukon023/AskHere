<?php
session_start();
include("conn.php");
$user = $_SESSION['DisplayName'];
$liked=$_GET['liked'];
$qid=$_GET['qid'];

if($liked=="false"){
    $sql="DELETE FROM qlikes WHERE DisplayName='$user' AND QID='$qid'";
    $sql3 = "UPDATE question SET QVotes=QVotes-1 WHERE QID=$qid";

    mysqli_query($conn,$sql);
    mysqli_query($conn,$sql3);

}
else{
    $sql="INSERT INTO qlikes(DisplayName,QID) VALUES('$user','$qid')";
    $sql2 = "UPDATE question SET QVotes=QVotes+1 WHERE QID=$qid";

    mysqli_query($conn,$sql);
    mysqli_query($conn,$sql2);
}
header("location:qdetailsn.php?details=".$qid);
?>