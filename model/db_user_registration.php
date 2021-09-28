<?php
// Modulen för att skapa användare på registrera sidan.
session_start();

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

$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

//mysql inserten. Ingen säkerhet applicerad på denna inmatning förutom ovan specialcharacters.
$sql = "INSERT INTO users (first_name, last_name, user_email, username, password, country_code, cellphone_nr, profile_desc, is_user)
    VALUES ('$firstName', '$lastName', '$userEmail', '$userName', '$hashedPwd', '$countryCode', '$cellPhone', '$profileDesc', '$userRole');";
mysqli_query($conn, $sql);


header( 'Location: ../userlogin' );
die;
