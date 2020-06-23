<?php
session_start();
if (!isset($_SESSION['DisplayName'])) {
    echo "<script type='text/javascript'>
          window.location='index.php';
        </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Tags</title>
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

            <div class="container-fluid">
                <div class="w3-container">
                    <p><br></p>
                </div>
                <div class="row">

                    <?php
                    include_once("conn.php");
                    $sql = "SELECT TName,TDescription FROM tag";
                    $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
                    while ($record = mysqli_fetch_assoc($resultset)) {
                        ?>

                        <!--https://getbootstrap.com/docs/4.0/components/card/----------->
                        <div class="col-md-4" >
                            <div class="card bg-light mb-3" style="max-width: 25rem; height:20rem;">
                                <div class="card-header w3-center">
                                    <h5><?php echo $record['TName'] ?></h5>
                                </div>
                                <div class="card-body ">
                                    <p class="card-text w3-padding-bottom"><?php echo $record['TDescription'] ?></p>
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