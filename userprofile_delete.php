<?php
session_start();
$DisplayName = $_SESSION['DisplayName'];
include('conn.php');

///session user
$sql = "SELECT * from user WHERE DisplayName='$DisplayName'";
if ($result = mysqli_query($conn, $sql)) {
    $row = mysqli_fetch_array($result);
}

$pass = $row['Password'];


///user whose profile is being edited
if (isset($_GET['user'])) {

    $user2 = $_GET['user'];
    ///
    //echo $user2;

    $rec = mysqli_query($conn, "SELECT * FROM user WHERE DisplayName='$user2';");
    $record = mysqli_fetch_array($rec);

    $passdb = $record['Password'];

    //
    //echo $password;
    //echo $password2;
}

if (isset($_POST['submit'])) {
    
    $pass1 = $_POST['pass1'];

    echo "pass-> ".$pass."  passdb->".$passdb." pass1-> ".$pass1;
    echo $user2."  ".$DisplayName;

    if($pass==$passdb)
    {
        if($pass==$pass1)
        {
            $sql="DELETE FROM user WHERE DisplayName='$DisplayName';";
            mysqli_query($conn,$sql);
            echo "<script type='text/javascript'>
            alert('Successful');
            window.parent.parent.window.location='index.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Failed! Password did not match.');
            </script>";
        }
    }
    else{
        echo "<script type='text/javascript'>
        alert('Update failed! You are not authorized to modify this profile!');
        </script>";
    }
}

?>

<html>

<head>
    <?php include('links.php'); ?>
    <meta charset=" utf - 8 " />
    <link rel=" stylesheet " href="css/bootstrap.min.css " />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="w3-container" style="margin-bottom:10%;">
        <div class="w3-container w3-red w3-center">
            <h2>Delete Profile !!!</h2>
        </div>
        <form class="w3-container w3-margin" method="POST">
            <p>
                <label class="w3-text-black"><b>Password</b></label>
                <input class="w3-input w3-border w3-pale-green" name="pass1" type="password" placeholder="********" required></p>
            <!--
            <p>
                <button class="w3-btn w3-brown w3-block">Update</button></p>  -->
            <button class="w3-btn w3-indigo w3-block" type="submit" name="submit">
                Confirm!
            </button>
        </form>
    </div>
</body>

</html>