<?php

// Verify that session and user is valid before showing ldap_control_paged_result

if ($_SESSION['loggedIn'] != true) {
  header('Location: ../userlogin');
  exit();
} else {
  echo 'Welcome ' . $_SESSION['userName'] . '. <br>';
  echo 'Your registered phonenumber: ' . $_SESSION['phone'] . '<br>';
  echo 'You logged in successfully: ' . $_SESSION['loggedIn'] . '<br>';
}
