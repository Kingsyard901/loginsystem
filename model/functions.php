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
    $_SESSION['phone'] = $uidExists['cellphone_nr'];

    include '../controller/sms_number_generator.php';
    $_SESSION['numberToVerify'] = $numberVerification;

    $sms = array(
      'from' => 'MittLogin',   /* Can be up to 11 alphanumeric characters */
      'to' => $_SESSION['phone'],  /* The mobile number you want to send to */
      'message' => $_SESSION['numberToVerify'],
    );

    $username = getenv('ELKSUSER');
    $password = getenv('ELKSPASS');

    $context = stream_context_create(array(
      'http' => array(
        'method' => 'POST',
        'header'  => "Authorization: Basic ".
                     base64_encode($username.':'.$password). "\r\n".
                     "Content-type: application/x-www-form-urlencoded\r\n",
        'content' => http_build_query($sms),
        'timeout' => 10
    )));

    $response = file_get_contents(
      'https://api.46elks.com/a1/SMS', false, $context );

    if (!strstr($http_response_header[0],"200 OK"))
      return $http_response_header[0];

    // return $response;

  }

  header("Location: ../smsverify");
  exit();
}
