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

  <title>Home</title>
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

      <div class="container-fluid ">

        <div class="w3-container w3-padding">
          <h2 class="w3-text-black">Top Questions:</h2>
          <div class="w3-bar w3-margin w3-right-align">
            <a href="questions_latest.php" class="w3-button w3-deep-purple">Latest</a>
            <a href="questions_popular.php" class="w3-button w3-indigo">Popular</a>
            <a href="questions_unanswered.php" class="w3-button w3-red">Unanswered</a>
          </div>
        </div>
        <?php
        include_once("conn.php");
        $sql = "SELECT QTitle,QTags,QVotes,QAnswers,QID FROM question";
        $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

        while ($record = mysqli_fetch_assoc($resultset)) {
          ?>

        <div class="w3 container border-top" style="padding-bottom: 10px">
          <div class="w3-row-padding">
            <div class="w3-col m2">
              <br>
              <div> <?php echo $record['QVotes']; ?> <i>votes</i></div>
              <br>
              <div><?php echo $record['QAnswers']; ?> <i>answers</i></div>
              <br>
            </div>

            <div class="w3-col m9">
              <div>
                <h4> <strong><?php echo $record['QTitle']; ?></strong></h4>
              </div>
              <br>
              <div>
                <strong>Tags: </strong> <?php echo $record['QTags']; ?>
                <a href="qdetailsn.php?details=<?php echo $record['QID']; ?>" class="btn btn-primary w3-margin-left">View Details</a>
              </div>
            </div>

          </div>
        </div>


        <?php } ?>
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