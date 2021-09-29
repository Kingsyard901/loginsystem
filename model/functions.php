<?php

include 'dbconn.php';

function uidExists($conn, $userName) {
  $sql = "SELECT * FROM users WHERE username = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header( 'Location: ../userlogin' );
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $userName);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}


function loginUser($conn, $userName, $userPass) {
  $uidExists = uidExists($conn, $userName);

  if ($uidExists === false) {
    header("Location: ../page404");
    exit();
  }

  $pwdHashed = $uidExists['password'];
  $checkPwd = password_verify($userPass, $pwdHashed);

  if ($checkPwd === false) {
    header("Location: ../userlogin");
    exit();
  } else if ($checkPwd === true) {
    session_start();
    $_SESSION['userName'] = $uidExists['username'];
    header("Location: ../home");
    exit();
  }
}
