<?php
    // Start Session (if page include $_SESSION)
    session_start();
    // $_SERVER
    $path = $_SERVER["REQUEST_URI"];
    $path = parse_url($path, PHP_URL_PATH);

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
        case '/user/delete':
            require "includes/user/delete.php";
            break;
        case '/user/add':
            require "includes/user/add.php";
            break;
        case '/user/update':
            require "includes/user/update.php";
            break;
        case '/user/changepwd':
            require "includes/user/changepwd.php";
            break;

        case '/post/add':
            require "includes/post/add.php";
            break;
        case '/post/update':
            require "includes/post/update.php";
            break;
        case '/post/delete':
            require "includes/post/delete.php";
            break;

        case '/auth/login':
            require "includes/auth/do_login.php";
            break;
        case '/auth/signup':
            require "includes/auth/do_signup.php";
            break;
    }
?>