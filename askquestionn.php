<?php
session_start();
if (!isset($_SESSION['DisplayName'])) {
    echo "<script type='text/javascript'>
          window.location='index.php';
        </script>";
}
include('conn.php');
if (isset($_POST['qSubmit'])) {
    $qTitle = $_POST['qTitle'];
    $qDescription = $_POST['qDescription'];
    $qTags = $_POST['tags'];
    $qVotes = 0;
    $qAnswers = 0;
    $qBy = $_SESSION['DisplayName'];
    date_default_timezone_set('Asia/Dhaka');
    $qDate = date("Y-m-d");
    $qTime = date("h:i:s");
    $sql = "Insert into question(QTitle,QDescription,QTags,QVotes,QAnswers, QBy,QDate,QTime)
    values('$qTitle','$qDescription','$qTags','$qVotes','$qAnswers','$qBy','$qDate','$qTime');";
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'> alert('Your question has been submitted successfully!');
        window.location='homen.php';
        </script>";
    } else {
                
        echo "<script type='text/javascript'> alert('Sorry! Something went wront...');
        window.location='askquestionn.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Ask Question</title>
    <!---------------------------------------links------------------------->
    <?php include('links.php'); ?>
    <!--nicEdit----->
    <script src="js/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>


</head>

<body>

    <div class="d-flex" id="wrapper">

        <!------------------------------------------sidebar------------------------------>
        <?php include('sidebarn.php'); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!------------------------------------navbar------------------------------------>
            <?php include('navbarn.php'); ?>


            <!---------------------------------main container---------------------------------->
            <div class="container-fluid">

                <div class="w3-container">
                    <p> <br></p>
                </div>

                <div class="w3-container" style="padding-bottom: 5%; padding-top:2%;">
                    <form method="POST">
                        <div class="form-group">
                            <label for="qTitle">Question Title: </label>
                            <input class="form-control" type="text" name="qTitle" id="qTitle">
                        </div>
                        <div class="form-group">
                            <label for="qDes">Description: </label>
                            <textarea name="qDescription" id="qDes" rows="20" cols="80" style="width:80%;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags: </label>
                            <input class="form-control" type="text" name="tags" id="tags">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary float-left" type="submit" name="qSubmit" value="Submit">
                        </div>
                    </form>

                </div>

            </div>

            <?php include('footern.php'); ?>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>


</body>


</html>