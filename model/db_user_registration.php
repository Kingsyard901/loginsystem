<?php

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

// $firstName = $_POST['userfirst']);
// $lastName = $_POST['userlast']);
// $userEmail = $_POST['usersemail']);
// $userName = $_POST['usersname']);
// $password = $_POST['userspassword']);
// $countryCode = $_POST['countrycodenr']);
// $cellPhone = $_POST['mobilenr']);
// $profileDesc = $_POST['profiletext']);
// $userRole = $_POST['user_role']);

echo $firstName,
$lastName,
$userEmail,
$userName,
$password,
$countryCode,
$cellPhone,
$profileDesc,
$userRole;

// $hashedPwd = password_hash($password, PASSWORD_DEFAULT);


require_once '../controller/functions.php';
echo 'file included';
//
// if (emptyInputSignup($firstName, $lastName, $userEmail, $userName, $password, $countryCode, $cellPhone, $profileDesc) !== false) {
//   header( 'Location: ../userregistration' );
//   exit();
// }
//
// if (invalidUid($firstName, $lastName, $userEmail, $userName, $password, $countryCode, $cellPhone, $profileDesc) !== false) {
//   header( 'Location: ../userregistration' );
//   exit();
// }


//mysql inserten. Ingen säkerhet applicerad på denna inmatning förutom ovan specialcharacters.
// $sql = "INSERT INTO users (first_name, last_name, user_email, username, password, country_code, cellphone_nr, profile_desc, is_user)
//     VALUES ('$firstName', '$lastName', '$userEmail', '$userName', '$hashedPwd', '$countryCode', '$cellPhone', '$profileDesc', '$userRole');";
// mysqli_query($conn, $sql);

createUser($conn, $firstName, $lastName, $userEmail, $userName, $password, $countryCode, $cellPhone, $profileDesc, $userRole);
echo 'function executed.';
