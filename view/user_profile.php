<?php
// Personal profilepage.
// Verify that session and user is valid before showing page

if ($_SESSION['loggedIn'] != true) {
  header('Location: ../userlogin');
  exit();
}

?>

<h1>My Profile Page</h1>
<div>
  <?php
    echo 'Welcome ' . $_SESSION['userName'] . '. <br>';
    echo 'Your registered phonenumber: ' . $_SESSION['phone'] . '<br>';
    echo 'You logged in successfully: ' . $_SESSION['loggedIn'] . '<br>';
   ?>
</div>
