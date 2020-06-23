<?php
session_start();

include('conn.php');
if (isset($_POST['login'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE DisplayName='$userName' AND Password='$password'";
    $result = $conn->query($sql);

    $record = mysqli_fetch_assoc($result);
    $_SESSION['ProfilePic'] = $record['ImageSrc'];

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['DisplayName'] = $userName;

        echo "<script type='text/javascript'> 
          window.location='homen.php';
          </script>";

    } else {
        echo "<script type='text/javascript'> alert('We could not find this user in our database! Please check your username & password and try again...');
          window.location='index.php';
          </script>";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>AskHere</title>
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
                        <a class="btn btn-primary w3-text-black" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary w3-text-black" href="#about">About</a>
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

    <!--Log In modal Start-->
    <div class="modal fade" id="login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Log In</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">

                        <br />
                        <div class="form-group">
                            <label for="userName">Username:</label>
                            <input type="text" class="form-control" id="userName" name="userName" required />
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" required name="password" />
                        </div>

                        <button type="submit" name="login" class="btn btn-primary btn-block">
                            Submit
                        </button>
                    </form>
                </div>
                <div class="modal-footer d-block">
                    <button type="button" class="btn btn-danger float-left" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--Log In modal end-->

    <!--Home Start-->

    <div id="home" class="container-fluid">
        <div class="row" style="padding-top: 2%;padding-bottom: 2%">
            <div class="w3-container">
                <img src="image/banner.jpg" width="100%" alt="" />
                <div class="carousel-caption" style="padding-bottom: 0px;margin-bottom: 0px;">
                    <a href="signup.php" class="btn btn-lg btn-primary w3-text-black">Sign
                        Up</a>
                    <p style="font-size: 2vw; color:white">
						Askhere: Come curious, leave enriched!
					</p>
					<p style="font-size: 2vw; color:black;">
						The website serves as a platform for users to ask and answer questions, and,
						through membership and active participation, to vote questions and answers
						and edit questions. <br />
                    </p>
                    <h3 style="color: black;font-size: 2.25vw">
                        Welcome to 
                        <a href="index.php" class="badge" style="font-size: 3vw">AskHere</a>
                        !
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!--Home End-->

    

    <br>
    <!--Footer Start-->
    <!-- Footer -->
    <footer class="page-footer font-small w3-blue pt-4" id="about" style="bottom:0%">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-2 mt-md-0 mt-3 w3-center">

                    <!-- Content -->
                    <img src="image\logo3.png" width="100px" height="100px">
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

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">phone: +8801732990652</a>
                        </li>
                        <li>
                            <a href="#!">email: u1604023@student.cuet.ac.bd</a>
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
        <div class="footer-copyright text-center  bg-primary py-3">©
            <a href="https://www.facebook.com/md.rukon.3344"> Muhammad Eshaque Ali Rukon</a>
        </div>
        <!-- Copyright -->

    </footer>

    <!--Footer End-->
</body>

</html>