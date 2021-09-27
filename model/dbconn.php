<?php
//Den vanliga connection filen till mysql.
$dbServername = 'localhost';
$dbUsername = 'newuser';
$dbPassword = '1234';
$dbName = 'logindb';

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
