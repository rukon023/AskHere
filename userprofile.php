<?php
session_start();
if (!isset($_SESSION['DisplayName'])) {
    echo "<script type='text/javascript'>
          window.location='index.php';
        </script>";
}
$user = $_SESSION['DisplayName'];

include_once("conn.php");
$rec = mysqli_query($conn, "SELECT * FROM user WHERE DisplayName='$user';");
$record = mysqli_fetch_array($rec);

$pass = $record['Password'];


?>

<?php

if (isset($_GET['udetails'])) {
    
    $DisplayName = $_GET['udetails'];

    $rec = mysqli_query($conn, "SELECT * FROM user WHERE DisplayName='$DisplayName';");
    $record = mysqli_fetch_array($rec);

    $imageSrc = $record['ImageSrc'];
    $uName = " " . $record['FirstName'] . " " . $record['LastName'];
    $email = $record['Email'];
    $about = $record['About'];
}

if ($user != $DisplayName) {
    $disabled = "disabled";
} else {
    $disabled = "";
}


if (isset($_POST['qDelete'])) {
    $qdel_ID = $_POST['delt'];
    $pass2 = $_POST['pass'];
    
    if ($pass == $pass2) {
        $sql_0 = "DELETE FROM question WHERE QID='$qdel_ID';";
        $sql_1 = "DELETE FROM answer WHERE AID='$qdel_ID';";

        mysqli_query($conn, $sql_0);
        mysqli_query($conn, $sql_1);
        header("Location: userprofile.php?udetails=$user");
    } else{
        echo "<script type='text/javascript'> alert('Wrong password! Please try again.');
        window.location='userprofile.php?udetails=$user';
        </script>";
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>

    <title>User Profile</title>
    <!---------------------------------------links------------------------->
    <?php include('links.php'); ?>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!------------------------------------------sidebar------------------------------>
        <?php include('sidebarn.php'); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!------------------------------------navbar------------------------------------>
            <?php include('navbarn.php'); ?>

            <!----------------------------------main content--------------------------------->
            <div class="container-fluid">
                <br><br>
                <div class="w3-row w3-container">

                    <div class="w3-col s3">
                        <img class="w3-border" src="<?php echo $imageSrc; ?>" style="max-height: 250px; max-width: 250px;">
                    </div>

                    <div class="w3-col s8">
                        <p> <strong> Name: </strong> <?php echo $uName; ?> </p>
                        <p> <strong> Email: </strong> <?php echo $email; ?> </p>
                        <p> <strong> About: </strong> <?php echo $about; ?> </p>
                    </div>

                </div>

                <div class="w3-container w3-block w3-margin-top w3-margin-bottom">
                    <button class="w3-button w3-deep-purple" onclick="setURL('userprofile_edit.php?user=<?php echo $DisplayName; ?>')" id="editprofile">Edit Profile</button>
                    <button class="w3-button w3-indigo" onclick="setURL('userprofile_changepassword.php?user=<?php echo $DisplayName; ?>')" id="change">Change Password</button>
                    <button class="w3-button w3-red" onclick="setURL('userprofile_delete.php?user=<?php echo $DisplayName; ?>')" id="delete">Delete Profile</button>
                    <a href="userprofile.php?udetails=<?php echo $DisplayName; ?>" class="w3-button w3-blue">Refresh</a>
                </div>

                <div class="w3-container w3-center">
                    <iframe src="conn.php" frameborder="0" class="iframe" width=90% id="iframe"></iframe>
                </div>

                <div class="w3-container w3-border-bottom">
                    <h2 class="w3-text-purple">Questions by <?php echo $DisplayName; ?>:</h2>
                </div>
                <div class="w3-container">
                    <?php

                    $sql = "SELECT QTitle,QTags,QVotes,QAnswers,QID FROM question WHERE QBy='$DisplayName'";
                    $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

                    while ($record = mysqli_fetch_assoc($resultset)) {
                        ?>

                    <div class="w3 container border-top" style="padding-bottom: 10px">
                        <div class="w3-row-padding">
                            <div class="w3-col s2">
                                <br>
                                <div> <?php echo $record['QVotes']; ?> <i>votes</i></div>
                                <br>
                                <div><?php echo $record['QAnswers']; ?> <i>answers</i></div>
                                <br>
                            </div>

                            <div class="w3-col s9">
                                <div>
                                    <h4> <strong><?php echo $record['QTitle']; ?></strong></h4>
                                </div>
                                <br>
                                <div>
                                    <strong>Tags: </strong> <?php echo $record['QTags']; ?>
                                </div>

                                <!----Question view, edit & delete buttons-------->
                                <div class="w3-bar-block w3-margin-top">
                                    <a href="qdetailsn.php?details=<?php echo $record['QID']; ?>" class="btn btn-primary w3-small" id="view">View</a>

                                    <button onclick="window.location.href ='qedit.php?qid=<?php echo $record['QID']; ?>';" class="btn w3-purple w3-small" id="edit" <?php echo $disabled; ?>>Edit</button>
                                    <?php $delConfirm = $record['QID']; ?>
                                    <button class="btn btn-danger w3-small " data-toggle="modal" data-target="#link" <?php echo $disabled; ?> onclick="funct(<?php echo $record['QID'] ?>)">Delete</button>

                                </div>

                            </div>

                        </div>
                    </div>


                    <?php } ?>
                </div>

            </div>

            <?php include('footern.php'); ?>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!----------------modal------------------->
    <div class="modal fade" id="link">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure you want to delete this question?</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <form action="userprofile.php" method="POST">
                        <div>
                            <input type="text" class="form-control" id="sharelink" name="delt" hidden />
                            <label for="pass">Password: </label>
                            <input type="password" class="form-control" id="pass" name="pass">
                            <br> <br>
                        </div>
                        <input type="submit" name='qDelete' class="btn btn-success float-right" value="Confirm">
                        <button type="button" class="btn btn-danger float-left" data-dismiss="modal">
                            Close
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->
    <!-- Menu Toggle Script -->
    <script>
        var ID;

        function funct(id) {
            $(".sharelink #link").val(id);
            ID = id;
        }

        $('#link').on('show.bs.modal', function(e) {
            var link = ID;
            $(e.currentTarget).find('input[name="delt"]').val(link);
        });
    </script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

    <!-----iframe handler script--->
    <script>
        function setURL(url) {
            document.getElementById('iframe').src = url;
            // document.getElementById('iframe').height = "550px";
        }
    </script>


    <!------------Iframe size controller---------------------->
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
    <script type='text/javascript'>
        $(function() {

            var iFrames = $('iframe');

            function iResize() {

                for (var i = 0, j = iFrames.length; i < j; i++) {
                    iFrames[i].style.height = iFrames[i].contentWindow.document.body.offsetHeight + 'px';
                }
            }

            if ($.browser.safari || $.browser.opera) {

                iFrames.load(function() {
                    setTimeout(iResize, 0);
                });

                for (var i = 0, j = iFrames.length; i < j; i++) {
                    var iSource = iFrames[i].src;
                    iFrames[i].src = '';
                    iFrames[i].src = iSource;
                }

            } else {
                iFrames.load(function() {
                    this.style.height = this.contentWindow.document.body.offsetHeight + 'px';
                });
            }

        });
    </script>


</body>


</html>