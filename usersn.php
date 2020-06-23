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

  <title>Users</title>
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
            <p> <br> </p>
        </div>
        <div class="row">
        <?php
        include_once("conn.php");
        $sql = "SELECT FirstName,LastName,ImageSrc,Email,Tags,DisplayName FROM user";
        $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        while ($record = mysqli_fetch_assoc($resultset)) {
            ?>
            
            <!--card design3-->
            <div class="col-md-6">
            <div class="card mb-3 w3-padding-large" style="max-width: 550px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img srcset="<?php echo $record['ImageSrc']; ?>" class="card-img" src="http://rukon.ourcuet.com/image/avatar.jpg">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold"><?php echo $record['FirstName']." ".$record['LastName']; ?></h5>
                            <p class="card-text"></p>
                            <span class="card-text"><small class="text-muted"> <?php echo $record['Email']; ?> </small></span>
                            <a href="userprofile.php?udetails=<?php echo $record['DisplayName']; ?>" class="btn btn-primary w3-margin-left" >View Details</a>
                        </div>
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

#include "median.h"
template <class N> 
 N median (N* numbers,size_t size){
    size_t mid = size/2;
    return size % 2 == 0? (numbers[mid] + numbers[mid-1])/2 : numbers[mid];
}