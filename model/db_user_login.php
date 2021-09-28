<?php

include 'dbconn.php';

$searchname = $_SESSION['username'];


$sql = "SELECT * FROM users WHERE user_first=('$searchname');";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);

if ($resultcheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // echo $row['user_first'] . '<br>';
        $usersname = $row['user_first'];
        $usersemail = $row['user_email'];
    }
} else {
    // prova lägga till en else här och "nolla" usersname, testa sedan att matcha det i pages?
    $usersname = '';
}

// My new code for login

// Fetching vars from login post from userlogin.php
$postUserName = mysqli_real_escape_string($conn, $_POST['loginuser']);
$postUserPass = mysqli_real_escape_string($conn, $_POST['loginpass']);
