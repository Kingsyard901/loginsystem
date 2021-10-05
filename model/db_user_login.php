<?php
// DB connection
include_once 'dbconn.php';

// Fetching login credentials from userlogin.php
$userName = mysqli_real_escape_string($conn, $_POST['loginuser']);
$userPass = mysqli_real_escape_string($conn, $_POST['loginpass']);

// Accessing functions.php
require_once 'functions.php';

// sending credentials for login process in functions.php.
loginUser($conn, $userName, $userPass);
