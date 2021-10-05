<?php
session_start();

// Including partials for header and menu
include 'view/partials/header.php';
include 'view/partials/navigation.php';

//Catch URL to var.
$page = basename($_GET['path']);

//Fetch page from URL/Navigation
if (file_exists('./view/' . $page . '.php')) {
    include './view/' . $page . '.php';
} elseif ($page == '' or $page == '/'){
    include './view/home.php';
} else {
    include './view/page404.php';
}

// Footer
include 'view/partials/footer.php';
