<?php
// Include connection to db
include 'dbconn.php';

// Checks if the user exists in db. This function is then included in function loginUser if TRUE.
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

// Function to login the user after checking via above function if user exists.
function loginUser($conn, $userName, $userPass) {
  $uidExists = uidExists($conn, $userName);

  if ($uidExists === false) {
    header("Location: ../page404");
    exit();
  }
  
// unhashes the password for comparison
  $pwdHashed = $uidExists['password'];
  $checkPwd = password_verify($userPass, $pwdHashed);

  if ($checkPwd === false) {
    header("Location: ../userlogin");
    exit();
  } else if ($checkPwd === true) { //if password comparison is correct, begin to login user by fetching db data and setting sessions.
    session_start();
    $_SESSION['userName'] = $uidExists['username'];
    $_SESSION['phone'] = $uidExists['cellphone_nr'];
    $_SESSION['userType'] = $uidExists['is_user'];

// Generate a random number to be sent to registered phonenumber.
    include '../controller/sms_number_generator.php';
    $_SESSION['numberToVerify'] = $numberVerification;

    // compiling sms
    $sms = array(
      'from' => 'MittLogin',   /* Can be up to 11 alphanumeric characters */
      'to' => $_SESSION['phone'],  /* The mobile number you want to send to */
      'message' => $_SESSION['numberToVerify'],
    );

// Personal API keys for connection to 46elks API
    $username = getenv('ELKSUSER');
    $password = getenv('ELKSPASS');

// API for sending SMS/Text message
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
