<?php
session_start();

// Including partials for header and menu
include 'view/partials/header.php';
include 'view/partials/navigation.php';

//Catch and direct to home
$page = basename($_GET['path']);

//Fetch page from URL/Navigation
if (file_exists('./view/' . $page . '.php')) {
    include './view/' . $page . '.php';
} elseif ($page == '' or $page == '/'){
    include './view/home.php';
} else {
    include './view/page404.php';
}

include 'view/partials/footer.php';
