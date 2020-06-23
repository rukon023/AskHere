<nav class="navbar navbar-expand-lg navbar-light bg-primary border-bottom" style=" ">
  <button class="btn" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mt-2 mt-lg-0 ">
      <li class="nav-item ">
        <!--------------------------------search form------------------------->
        <form class="form-inline ml-lg-3" action="search.php" method="POST">
          <input class="form-control mr-sm-2" type="search" name="searchDes" placeholder="Search" aria-label="Search" style="width: 600px;">
          <button class="btn btn-dark my-2 my-sm-0" type="submit" name="submitSearch">Search</button>
        </form>
      </li>


    </ul>
    <ul class="navbar-nav ml-auto">

      <li class="nav-item mr-auto">
        <img src="<?php echo $_SESSION['ProfilePic']; ?>" onerror="this.onerror=null;
             this.src='images/avatar.png'" alt="User" height="28px" width="28px" style="border-radius: 50%;">
      </li>
      <!-------dropdown------->
      <div class="w3-dropdown-hover">
        <button class="w3-button"><?php echo $_SESSION['DisplayName']; ?></button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
          <a href="userprofile.php?udetails=<?php echo $_SESSION['DisplayName']; ?>" class="w3-bar-item w3-button">View Profile</a>
          <a href="index.php" class="w3-bar-item w3-button">Log Out</a>
        </div>
      </div>

    </ul>
  </div>
</nav>