<?php
session_start();

// Checks the six-digit random code sent to the phonenumber against the code stashed in the session. If match, it logs user in and unsets session.
$codeInput = htmlspecialchars($_POST['smsverificationinput']);

if ($codeInput != $_SESSION['numberToVerify']) {
  header("Location: ../page404");
  exit();
} else {
  session_start();
  $_SESSION['loggedIn'] = true;
  header("Location: ../user_profile");
  unset( $_SESSION['numberToVerify'] );
  exit();
}
