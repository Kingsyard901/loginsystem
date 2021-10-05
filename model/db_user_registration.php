<?php
// DB connection.
include_once 'dbconn.php';

// Using MySqli from YT tutorial to avoid SQL injection
$firstName = mysqli_real_escape_string($conn, $_POST['userfirst']);
$lastName = mysqli_real_escape_string($conn, $_POST['userlast']);
$userEmail = mysqli_real_escape_string($conn, $_POST['usersemail']);
$userName = mysqli_real_escape_string($conn, $_POST['usersname']);
$password = mysqli_real_escape_string($conn, $_POST['userspassword']);
$countryCode = mysqli_real_escape_string($conn, $_POST['countrycodenr']);
$cellPhone = mysqli_real_escape_string($conn, $_POST['mobilenr']);
$profileDesc = mysqli_real_escape_string($conn, $_POST['profiletext']);
$userRole = mysqli_real_escape_string($conn, $_POST['user_role']);

// SQL command to INSERT data from the collected vars
$sql = "INSERT INTO users (first_name, last_name, user_email, username, password, country_code, cellphone_nr, profile_desc, is_user)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
// Preparing the statement with connection to db
$stmt = mysqli_stmt_init($conn);
// function to check for errors in the connections
if (!mysqli_stmt_prepare($stmt, $sql)) {
  header('Location: ../userregistration');
  echo 'Something went wrong, try again!';
  exit();
}
// Hashing the password using PHP built in function
$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

// binding data to be sent to db, with "s" as placeholders (s for string)
mysqli_stmt_bind_param($stmt, "sssssssss", $firstName, $lastName, $userEmail, $userName, $hashedPwd, $countryCode, $cellPhone, $profileDesc, $userRole);
// Execute command and send data
mysqli_stmt_execute($stmt);
// Closing the statement using mysqli
mysqli_stmt_close($stmt);

// After registration, user is taken to login page.
header( 'Location: ../userlogin' );
die;
