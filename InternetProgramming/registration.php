<?php

require "conn.php";

$fname=$_POST["fname"];
$lname=$_POST["lname"];
$dname=$_POST["dname"];
$email=$_POST["email"];
$password=$_POST["password"];
$tags=$_POST["tags"];

//img 
$imgName=$_POST['imgName'];
$target_dir="http://rukon.ourcuet.com/InternetProgramming/image/";
$pathName="image/";
$target_file=$pathName.$imgName;

$imageSrc=$target_dir.$imgName;

$uploadOk = 1;
// file==image verification()


//check if file already exists
if(file_exists($target_file)){
    echo "Sorry, Image already exists!";
    $uploadOk=0;
}



$sql="Insert into user(FirstName,LastName,DisplayName,ImageSrc,Email,Password,Tags)
    values('$fname','$lname','$dname','$imageSrc','$email','$password','$tags');";


$result=$conn->query($sql);

if(move_uploaded_file($_FILES["imgToUpload"]["tmp_name"], $target_file)){
    if($result){
        echo file_get_contents('index.html');
    }
} else{
    echo "Sorry, something went wrong...";
}

 ?>


