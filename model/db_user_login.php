<?php

include_once 'dbconn.php';

$userName = mysqli_real_escape_string($conn, $_POST['loginuser']);
$userPass = mysqli_real_escape_string($conn, $_POST['loginpass']);

require_once 'functions.php';

loginUser($conn, $userName, $userPass);
