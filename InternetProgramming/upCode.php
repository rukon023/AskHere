<?php

require "conn.php";

$code=$_POST["Code2"];

$sql="Insert into code(userCode)
    values('$code');";

if($conn->query($sql)===TRUE)

{
    echo "You have successfully completed your registration!!!";
}
else
     echo "Sorry, something went wrong...";

echo $code;
 ?>

