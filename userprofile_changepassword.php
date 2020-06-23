<?php
session_start();
$DisplayName = $_SESSION['DisplayName'];
include('conn.php');

///session user
$sql = "SELECT * from user WHERE DisplayName='$DisplayName'";
if ($result = mysqli_query($conn, $sql)) {
    $row = mysqli_fetch_array($result);
}
$passOrg = $row['Password'];


///user whose profile is being edited
if (isset($_GET['user'])) {

    $user2 = $_GET['user'];
    ///
    //echo $user2;

    $rec = mysqli_query($conn, "SELECT * FROM user WHERE DisplayName='$user2';");
    $record = mysqli_fetch_array($rec);

    $passDb = $record['Password'];

    //
    //echo $password;
    //echo $password2;
}

if (isset($_POST['submit'])) {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    //
    //echo "passOrg-> ".$passOrg."  passDb->".$passDb." pass1-> ".$pass1." pass2->".$pass2." pass3->".$pass3."\n";
    //echo $user2;


    if($passOrg==$passDb && $pass1==$passOrg)
    {
        if($pass2==$pass3)
        {
            $sql="UPDATE user SET Password='$pass2' WHERE DisplayName='$DisplayName'";
            mysqli_query($conn,$sql);
            echo "<script type='text/javascript'>
            alert('Successful');
            window.location='userprofile_edit?user='<?php echo $user2; ?>.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Update failed! Password did not match.');
            </script>";
        }
    }
    else{
        echo "<script type='text/javascript'>
        alert('Update failed! Either you entered wrong password or you are not authorized to modify this profile!');
        </script>";
    }
}

?>


<html>

<head>
    <?php include('links.php'); ?>
    <meta charset=" utf - 8 " />
    <meta name=" viewport " content=" width = device - width, initial - scale = 1 " />
    <link rel=" icon " href="images/logo/banner.png " type="image/x-icon">
    <link rel=" stylesheet " href="css/bootstrap.min.css " />
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="w3-container" style="margin-bottom:10%;">
        <div class="w3-container w3-indigo w3-center">
            <h2>Change Password</h2>
        </div>
        <form class="w3-container w3-margin" method="POST">
            <p>
                <label class="w3-text-black"><b>Current Password:</b></label>
                <input class="w3-input w3-border w3-pale-green" name="pass1" type="password" placeholder="********" required></p>
            <p>
                <label class="w3-text-black"><b>New Password:</b></label>
                <input class="w3-input w3-border w3-pale-green" name="pass2" type="password" placeholder="**********" required></p>
            <p>
                <label class="w3-text-black"><b>Confirm New Password:</b></label>
                <input class="w3-input w3-border w3-pale-green" name="pass3" type="password" placeholder="**********" required></p>
            
            <!--
            <p>
                <button class="w3-btn w3-brown w3-block">Update</button></p>  -->
            <button class="w3-btn w3-blue w3-block" name="submit" type="submit">
                Update Password
            </button>
        </form>
    </div>
</body>

</html>