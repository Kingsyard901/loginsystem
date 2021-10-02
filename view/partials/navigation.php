<!-- https://www.w3schools.com/css/css_navbar_horizontal.asp -->



<ul>

  <!-- Home OPEN -->
  <li><a href="home">Home</a></li>

  <?php
  // userLogin OPEN
    if ($_SESSION['loggedIn'] != true) {
      ?>
      <li><a href="userlogin">Login</a></li>
      <?php
    } else {
      echo '';
    }

    // userregistration OPEN
    if ($_SESSION['loggedIn'] != true) {
      ?>
      <li><a href="userregistration">Register</a></li>
      <?php
    } else {
      echo '';
    }

    // adminlogin OPEN
    if ($_SESSION['loggedIn'] != true) {
      ?>
      <li><a href="adminlogin">Admin Login</a></li>
      <?php
    } else {
      echo '';
    }

    // adminregistration CLOSED
    if ($_SESSION['loggedIn'] != true) {
      echo '';
    } else {
      ?>
      <li><a href="adminregistration">Admin Registration</a></li>
      <?php
    }

    // user_profile CLOSED
    if ($_SESSION['loggedIn'] != true) {
      echo '';
    } else {
      ?>
      <li><a href="user_profile">My Profile</a></li>
      <?php
    }

    // logout CLOSED
    if ($_SESSION['loggedIn'] != true) {
      echo '';
    } else {
      ?>
      <li style="float:right"><a class="active" href="logout">Logga ut (<?=$_SESSION['userName']?>)</a></li>
      <?php
    }
   ?>
</ul>
