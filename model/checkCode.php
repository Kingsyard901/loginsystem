<?php
session_start();

// $codeInput = mysqli_real_escape_string($conn, $_POST['smsverificationinput']);
$codeInput = htmlspecialchars($_POST['smsverificationinput']);

if ($codeInput != $_SESSION['numberToVerify']) {
  header("Location: ../page404");
  exit();
} else {
  header("Location: ../user_profile");
  unset( $_SESSION['numberToVerify'] );
  exit();
}
