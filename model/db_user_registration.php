<?php
// Modulen för att skapa användare på registrera sidan.
session_start();

include_once 'dbconn.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  Using MySqli from YT tutorial to avoid SQL injection
  $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
  $lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
  $userEmail = mysqli_real_escape_string($conn, $_POST['useremail']);
  $userName = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $countryCode = mysqli_real_escape_string($conn, $_POST['country_code']);
  $cellPhone = mysqli_real_escape_string($conn, $_POST['cellphone_nr']);
  $profileDesc = mysqli_real_escape_string($conn, $_POST['profile_desc']);

  // $firstName = htmlspecialchars($_POST['first_name']);
  // $lastName = htmlspecialchars($_POST['last_name']);
  // $userEmail = htmlspecialchars($_POST['useremail']);
  // $userName = htmlspecialchars($_POST['username']);
  // $password = htmlspecialchars($_POST['password']);
  // $countryCode = htmlspecialchars($_POST['country_code']);
  // $cellPhone = htmlspecialchars($_POST['cellphone_nr']);
  // $profileDesc = htmlspecialchars($_POST['profile_desc']);

  // $_SESSION['username'] = htmlspecialchars(ucfirst($_POST['first_name']));

// }

//mysql inserten. Ingen säkerhet applicerad på denna inmatning förutom ovan specialcharacters.
$sql = "INSERT INTO users (first_name, last_name, useremail, username, password, country_code, cellphone_nr, profile_desc)
    VALUES ('$firstName', '$lastName', '$userEmail', '$userName', '$password', '$countryCode', 'cellPhone', 'profileDesc');";
mysqli_query($conn, $sql);

header( 'Location: ../user_profile' );
die;
