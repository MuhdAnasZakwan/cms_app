<?php
    // Start Session (if page include $_SESSION)
    session_start();
    // $_SERVER
    $path = $_SERVER["REQUEST_URI"];

    require "includes/functions.php";

    switch ($path) {
        default:
            require "pages/home.php";
            break;

        // Pages Route
        case '/login':
            require "pages/login.php";
            break;
        case '/signup':
            require "pages/signup.php";
            break;
        case '/logout':
            require "pages/logout.php";
            break;
        case '/dashboard':
            require "pages/dashboard.php";
            break;
        case '/post':
            require "pages/post.php";
            break;
        case '/manage-users':
            require "pages/manage-users.php";
            break;
        case '/manage-users-add':
            require "pages/manage-users-add.php";
            break;
        case '/manage-users-edit':
            require "pages/manage-users-edit.php";
            break;
        case '/manage-users-changepwd':
            require "pages/manage-users-changepwd.php";
            break;
        case '/manage-posts':
            require "pages/manage-posts.php";
            break;
        case '/manage-posts-add':
            require "pages/manage-posts-add.php";
            break;
        case '/manage-posts-edit':
            require "pages/manage-posts-edit.php";
            break;
        
        // Action Route
        case '/manage-users-delete':
            require "pages/manage-users-delete.php";
            break;
        case '/manage-posts-delete':
            require "pages/manage-posts-delete.php";
            break;
        case '/auth/login':
            require "includes/auth/do_login.php";
            break;
        case '/auth/signup':
            require "includes/auth/do_signup.php";
            break;
    }
?>