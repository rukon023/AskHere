<?php

require "conn.php";

$Username=$_POST["username"];
$Password=$_POST["password"];

$sql="Select * From registration where username = '$Username' and password = '$Password';";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    echo "OK";    
}
else
{
    echo "Sorry, user not found !";
}

?>