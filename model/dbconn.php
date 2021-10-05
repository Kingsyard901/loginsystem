<?php
//DB connections data.
$dbServername = 'localhost';
$dbUsername = 'newuser'; //Loginname för PHPmyadmin user account
$dbPassword = '1234'; //Password for PHPmyadmin user account
$dbName = 'logindb'; //Database name where user data is saved.

// Variable storing DB connection used when connecting to db.
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// If statement checking if there is a connection lost/error and throwing error message.
if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}
