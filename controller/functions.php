<?php

// include_once '../model/dbconn.php';

function createUser($conn, $firstName, $lastName, $userEmail, $userName, $password, $countryCode, $cellPhone, $profileDesc, $userRole) {
  // SQL command to INSERT data from the collected vars
  $sql = "INSERT INTO users (first_name, last_name, user_email, username, password, country_code, cellphone_nr, profile_desc, is_user)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
  // Preparing the statement with connection to db
  $stmt = mysqli_stmt_init($conn);
  // function to check for errors in the connections
  // if (!mysqli_stmt_prepare($stmt, $sql)) {
  //   header('Location: ../userregistration');
  //   echo 'Something went wrong, try again!';
  //   exit();
  // }
  // Hashing the password using PHP built in function
  $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

  // binding data to be sent to db, with "s" as placeholders (s for string)
  mysqli_stmt_bind_param($stmt, "sssssssss", $firstName, $lastName, $userEmail, $userName, $hashedPwd, $countryCode, $cellPhone, $profileDesc, $userRole);
  // Execute command and send data
  mysqli_stmt_execute($stmt);
  // Closing the statement using mysqli
  mysqli_stmt_close($stmt);

  header( 'Location: ../userlogin' );
  // echo 'You can now login with your credentials you just regsitered.';
  die;
}
