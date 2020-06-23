<?php
session_start();
$DisplayName = $_SESSION['DisplayName'];
include('conn.php');

///session user
$sql = "SELECT * from user WHERE DisplayName='$DisplayName'";
if ($result = mysqli_query($conn, $sql)) {
    $row = mysqli_fetch_array($result);
}
$password = $row['Password'];


///user whose profile is being edited
if (isset($_GET['user'])) {

    $user2 = $_GET['user'];
    ///
    //echo $user2;

    $rec = mysqli_query($conn, "SELECT * FROM user WHERE DisplayName='$user2';");
    $record = mysqli_fetch_array($rec);

    $fname = $record['FirstName'];
    $lname = $record['LastName'];
    $about = $record['About'];
    $tags = $record['Tags'];
    $password2 = $record['Password'];

    //
    //echo $password;
    //echo $password2;
}

if (isset($_POST['submit'])) {
    $FirstName = $_POST['first'];
    $LastName = $_POST['last'];
    $About = $_POST['about'];
    $Tags = $_POST['tags'];

    $pass = $_POST['password'];

    //

    if ($pass == $password && $pass == $password2) {
        $sql = "UPDATE user SET FirstName='$FirstName' , LastName='$LastName', About = '$About', Tags = '$Tags'
                WHERE DisplayName='$user2'";
        mysqli_query($conn, $sql);

        $sql = "SELECT * from user WHERE DisplayName='$user2'";
        if ($result = mysqli_query($conn, $sql)) {
            $row = mysqli_fetch_array($result);
        }
        echo "<script type='text/javascript'>
        window.location='userprofile_edit?user='<?php echo $user2; ?>.php';
        </script>";
    } else {
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
        <div class="w3-container w3-deep-purple w3-center">
            <h2>Edit Profile</h2>
        </div>
        <form class="w3-container w3-margin" method="POST">
            <p>
                <label class="w3-text-black"><b>Username</b></label>
                <input class="w3-input w3-border w3-pale-green" name="uname" type="text" value="<?php echo $user2; ?>" disabled></p>
            <p>
                <label class="w3-text-black"><b>First Name</b></label>
                <input class="w3-input w3-border w3-pale-green" name="first" type="text" value="<?php echo $fname; ?>"></p>
            <p>
                <label class="w3-text-black"><b>Last Name</b></label>
                <input class="w3-input w3-border w3-pale-green" name="last" type="text" value="<?php echo $lname; ?>"></p>
            <p>
                <label class="w3-text-black"><b>About</b></label>
                <textarea class="w3-input w3-border w3-pale-green" name="about" type="text" value="" style="height:200px;"><?php echo $about; ?></textarea></p>
            <p>
                <label class="w3-text-black"><b>Tags</b></label>
                <input class="w3-input w3-border w3-pale-green" name="tags" type="text" value="<?php echo $tags; ?>"></p>

            <!----------------modal for checking password-------------->
            <div class="modal fade" id="confirm">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirm Update</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                &times;
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" required name="password" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-success btn-block">
                                Confirm
                            </button>
                        </div>
                        <div class="modal-footer d-block">
                            <button type="button" class="btn btn-danger float-left" data-dismiss="modal">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <p>
                <button class="w3-btn w3-brown w3-block">Update</button></p>  -->
            <button class="w3-btn w3-indigo w3-block" data-toggle="modal" data-target="#confirm">
                Update
            </button>
        </form>
    </div>
</body>

</html>