<?php
session_start();

include('conn.php');
if (isset($_POST['signup'])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $dname = $_POST["dname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $tags = $_POST["tags"];

    //img 
    $imgName = $_POST['imgName'];
    $target_dir = "http://rukon.ourcuet.com/InternetProgramming/image/";
    $pathName = "image/";
    $target_file = $pathName . $imgName;

    $imageSrc = $target_dir . $imgName;

    $uploadOk = 1;
    // file==image verification()


    //check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, Image already exists!";
        $uploadOk = 0;
    }



    $sql = "Insert into user(FirstName,LastName,DisplayName,ImageSrc,Email,Password,Tags)
    values('$fname','$lname','$dname','$imageSrc','$email','$password','$tags');";


    $result = $conn->query($sql);

    if (move_uploaded_file($_FILES["imgToUpload"]["tmp_name"], $target_file)) {
        if ($result) {
            echo "<script type='text/javascript'>
            window.location='index.php';
            </script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('Sorry! Something went wrong!!!');
        window.location='index.php';
        </script>";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <?php include('links.php'); ?>
</head>


<body class="w3-white" data-spy="scroll" data-target=".navbar" data-offset="50">
    <!--Navigation Bar Start-->
    <header>
        <nav class="navbar navbar-expand-sm bg-primary fixed-top">
            <a class="navbar-brand btn btn-sm " href="#"><img src="image/logo3.png" height="50px" width="50px" alt="" />
            </a>
            <h3 style="color: white;">AskHere</h3>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                        <a class="btn btn-primary w3-text-black" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary w3-text-black" href="index.php">About</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-primary w3-text-black" data-toggle="modal" data-target="#login">
                            Log In</button>
                    </li>
                </ul>
            </div>
        </nav>
        <br> <br> <br>
    </header>
    <!--Navigation Bar End-->

    <!--Sign up Start-->
    <div class="w3-container w3-display-middle ">
        <form action="signup.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="inputFname">First Name:</label>
                <input type="text" class="form-control" id="inputFname" name="fname" placeholder="Rakibul" required>
            </div>
            <div class="form-group">
                <label for="inputLname">Last Name:</label>
                <input type="text" class="form-control" id="inputLname" name="lname" placeholder="Islam" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email:</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="example@gmail.com" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword">Password:</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="********" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputDname"> Username:</label>
                <input type="text" class="form-control" id="inputDname" name="dname" placeholder="rakib060" required>
            </div>
            <div class="form-group">
                <label for="inputTags">Tags:</label>
                <input type="text" class="form-control" id="inputTags" name="tags" placeholder="C++, JAVA, PYTHON, JS, ..." required>
            </div>
            <!--for Image Uploading-->
            Select Profile Pic:
            <input type="file" name="imgToUpload" id="imgToUpload" required>
            <input type="text" name="imgName" id="imgName" placeholder="Rename Image" required>


            <button type="submit" name="signup" class="btn btn-primary active" aria-pressed="true">Sign Up</button>
        </form>

    </div>
    <!--Sign up end-->
</body>

</html>