<?php
error_reporting(0);
include 'header.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case "home":
            include 'home.php';
            break;

        case "profile":
            include 'profile.php';
            break;

        case "login":
            include 'login.php';
            break;

        default:
            include 'home.php';
            break;
    }
} else {
    include 'home.php';
}
include 'footer.php';
