<?php
session_start();
if (!isset($_SESSION['DisplayName'])) {
  echo "<script type='text/javascript'>
        window.location='index.php';
      </script>";
}

?>

<?php
 include_once("conn.php");

if(isset($_GET['udetails'])){

    $uName = $_GET['udetails'];

    $rec = mysqli_query($conn, "SELECT * FROM user WHERE DisplayName=$uName;");
    $record=mysqli_fetch_array($rec);

    $name=$_record['FirstName']." ".$_record['LastName'];
    $email=$_record['Email'];
    $imgSrc=$_record['ImageSrc'];
}

?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="w3-theme.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
    
    <!--Navbar-->
    <?php
    include("navbar.php"); ?>
    <div class="w3-top w3-container w3-blue">
  <nav class="navbar navbar-collapse ">
    <img src="logo3.png" height="50px" width="50px">
    <p></p>
    <form class="form-inline">
      <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search" style="width:700px">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <a href="#"><span class="fa fa-user" aria-hidden="true">pondit071</span></a>
    <a href="#"><span class="fa fa-sign-out" aria-hidden="true"></span>Log Out</a>
</div>
</div>
<!------------------------->
</nav>
</div>
    
    <!--sidebar-->
    <?php
    include("sidebar.php"); ?>
    <div class="w3-sidebar w3-container w3-bar-block w3-border-right w3-collapse w3-center w3-theme-l5 w3-animate-left"
    style="width:15%">
    <a href="home.php" class="w3-bar-item w3-button">Home</a>
    <a href="questions.php" class="w3-bar-item w3-button">Forum</a>
    <a href="tags.php" class="w3-bar-item w3-button">Tags</a>
    <a href="users.php" class="w3-bar-item w3-button">Users</a>
    <a href="askQuestion.php" class="w3-bar-item w3-button">Ask a Question</a>
</div>
    
    
    <!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
    <div class="w3-main w3-container" style="margin-left: 17%;">
        <div class="w3-container">
            <p> <br> <br> <br></p>
        </div>
        <br><br><br><br>
        <!--------------------------user Info------------------->
        <div class="w3-row w3-container">
            <div class="w3-col s2 ">
                     <img src="http://rukon.ourcuet.com/InternetProgramming/image/simanto.JPG" height="150px" width="150px" > </button>
            </div>
            <div class="w3-col s6 w3-container">
            <h2 class="w3-text-teal"><b>Ashish Pondit</b></h2>
            <small class="w3-text-indigo">email: pondit071@gmail.com</small>
            </div>
        </div>
        <br><br>

        <div class="w3-container w3-border-bottom" style="width:90%;">
            <h2 class="w3-text-teal w3-center">Questions </h2>
        </div>


        <?php
        ////////////question section//////////////////////////////////////////
        include_once("conn.php");
        $sql = "SELECT QTitle,Tags,QAnswers,QVotes,QID FROM question WHERE QBy=$uName";
        $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

        while ($record = mysqli_fetch_assoc($resultset)) {
            ?>
            <!--questions -------------------------------------------------------------------------------->
            <div class="w3-row w3-container w3-border-bottom" style="padding:5%;">
                <div class="w3-col s8">
                    <h3 class="w3-text-black">How do I organize JSON output after converting from CSV using Python?</h3>
                    <p class="w3-text-indigo">Tags: python, json, arrays, cvs   </p>
                    <small class="w3-text-indigo">14 Answers, 5 Votes</small>
                </div>
                <div class="w3-col s4">
                    <button class="btn btn-primary w3-margin w3-left-align">Edit</button> <br>
                    <button class="btn btn-primary w3-left-align">Delete</button>

                </div>
            </div>




            <div class="w3-row w3-container w3-border-bottom" style="padding:5%;">
                <div class="w3-col s8">
                    <h3 class="w3-text-black">How do I organize JSON output after converting from CSV using Python?</h3>
                    <p class="w3-text-indigo">Tags: python, json, arrays, cvs   </p>
                    <small class="w3-text-indigo">14 Answers, 5 Votes</small>
                </div>
                <div class="w3-col s4">
                    <button class="btn btn-primary w3-margin w3-left-align">Edit</button> <br>
                    <button class="btn btn-primary w3-left-align">Delete</button>

                </div>
            </div>
            <div class="w3-row w3-container w3-border-bottom" style="padding:5%;">
                <div class="w3-col s8">
                    <h3 class="w3-text-black">How do I organize JSON output after converting from CSV using Python?</h3>
                    <p class="w3-text-indigo">Tags: python, json, arrays, cvs   </p>
                    <small class="w3-text-indigo">14 Answers, 5 Votes</small>
                </div>
                <div class="w3-col s4">
                    <button class="btn btn-primary w3-margin w3-left-align">Edit</button> <br>
                    <button class="btn btn-primary w3-left-align">Delete</button>

                </div>
            </div>
            <div class="w3-row w3-container w3-border-bottom" style="padding:5%;">
                <div class="w3-col s8">
                    <h3 class="w3-text-black">How do I organize JSON output after converting from CSV using Python?</h3>
                    <p class="w3-text-indigo">Tags: python, json, arrays, cvs   </p>
                    <small class="w3-text-indigo">14 Answers, 5 Votes</small>
                </div>
                <div class="w3-col s4">
                    <button class="btn btn-primary w3-margin w3-left-align">Edit</button> <br>
                    <button class="btn btn-primary w3-left-align">Delete</button>

                </div>
            </div>
            <div class="w3-row w3-container w3-border-bottom" style="padding:5%;">
                <div class="w3-col s8">
                    <h3 class="w3-text-black">How do I organize JSON output after converting from CSV using Python?</h3>
                    <p class="w3-text-indigo">Tags: python, json, arrays, cvs   </p>
                    <small class="w3-text-indigo">14 Answers, 5 Votes</small>
                </div>
                <div class="w3-col s4">
                    <button class="btn btn-primary w3-margin w3-left-align">Edit</button> <br>
                    <button class="btn btn-primary w3-left-align">Delete</button>

                </div>
            </div>
            <div class="w3-row w3-container w3-border-bottom" style="padding:5%;">
                <div class="w3-col s8">
                    <h3 class="w3-text-black">How do I organize JSON output after converting from CSV using Python?</h3>
                    <p class="w3-text-indigo">Tags: python, json, arrays, cvs   </p>
                    <small class="w3-text-indigo">14 Answers, 5 Votes</small>
                </div>
                <div class="w3-col s4">
                    <button class="btn btn-primary w3-margin w3-left-align">Edit</button> <br>
                    <button class="btn btn-primary w3-left-align">Delete</button>

                </div>
            </div>
            



        <?php } ?>




        
        <!-- END MAIN -->
    </div>
    
    <!----footer---->
    <!--sidebar-->
    <?php
    include("footer.php"); ?>
      <!-- Footer -->
  <footer class="page-footer font-small w3-blue pt-4">

<!-- Footer Links -->
<div class="container-fluid text-center text-md-left">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-2 mt-md-0 mt-3 w3-center" style="margin-left: 210px">

      <!-- Content --> 
      <img src="logo3.png" width="100px" height="100px" >
      <p> </p>

    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none pb-3">

    <!-- Grid column -->
    <div class="col-md-3 mb-md-0 mb-3">

      <!-- Links -->
      <h5 class="text-uppercase">About</h5>
      <p>
        "AskHere" is a question and answer site for professional and enthusiast programmers.
      </p>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-3 mb-md-0 mb-3" style="margin-left: 100px">

      <!-- Links -->
      <h5 class="text-uppercase">Contact</h5>

      <ul class="list-unstyled w3-text-white">
        <li>
          <a href="#!" class="w3-text-white">phone: +8801732990652</a>
        </li>
        <li>
          <a href="#!" class="w3-text-white" >email: u1604023@student.cuet.ac.bd</a>
        </li>
        <li>
          <a href="https://www.facebook.com/md.rukon.3344" class="fa fa-facebook"></a>
          <a href="https://twitter.com/" class="fa fa-twitter"></a>
          <a href="https://aboutme.google.com/u/0/?referer=gplus" class="fa fa-google"></a>
          <a href="#" class="https://secure.skype.com/portal/profile"></a>
          <a href="https://www.reddit.com/user/madkon023" class="fa fa-reddit"></a>
        </li>
      </ul>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Footer Links -->

<!-- Copyright -->
<div class="footer-copyright text-center  bg-primary py-3" style="margin-left: 200px;">©
  <a href="https://www.facebook.com/md.rukon.3344" class="w3-text-white"> Muhammad Eshaque Ali Rukon</a>
</div>
<!-- Copyright -->

</footer>

</body>




</html>