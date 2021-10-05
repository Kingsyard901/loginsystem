<!-- Navigation -->
<!-- Some navigation buttons are either hidden if not logged in, or even hidden if user is not correct type of user for example super_admin. -->
<ul>

  <!-- Home OPEN -->
  <li><a href="home">Home</a></li>

  <?php
  // userLogin OPEN before login
    if ($_SESSION['loggedIn'] != true) {
      ?>
      <li><a href="userlogin">Login</a></li>
      <?php
    } else {
      echo '';
    }

    // userregistration OPEN before login
    if ($_SESSION['loggedIn'] != true) {
      ?>
      <li><a href="userregistration">Register</a></li>
      <?php
    } else {
      echo '';
    }

    // adminlogin OPEN before login
    if ($_SESSION['loggedIn'] != true) {
      ?>
      <li><a href="adminlogin">Admin Login</a></li>
      <?php
    } else {
      echo '';
    }

    // adminregistration CLOSED before login
    // Checks if user is currently logged in or not, as well as if user is super_admin.
    if ($_SESSION['loggedIn'] != true and $_SESSION['userType'] != 'super_admin') {
      echo '';
    } else {
      ?>
      <li><a href="adminregistration">Admin Registration</a></li>
      <?php
    }

    // View all users CLOSED TO all but super_admins
    if ($_SESSION['loggedIn'] != true and $_SESSION['userType'] != 'super_admin') {
      echo '';
    } else {
      ?>
      <li><a href="view_users">View All Users</a></li>
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
