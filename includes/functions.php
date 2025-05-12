<?php
    // Connect to Database
    function connectToDB () {
        // Database info
        $host = "127.0.0.1";
        $database_name = "cms-database";
        $database_user = "root";
        $database_password = "";
    
        // PDO (PHP Database Object)
        $database = new PDO("mysql:host=$host;dbname=$database_name", $database_user, $database_password);

        return $database;
    };

    function getUserByEmail( $email ) {

        // connect to database
        $database = connectToDB();
    
        // 5.1 SQL
        $sql = "SELECT * FROM users WHERE email = :email";
        // 5.2 prepare
        $query = $database->prepare( $sql );
        // 5.3 execute
        $query->execute([
            "email" => $email
        ]);
        // 5.4 fetch
        $user = $query->fetch(); // return the first row of the list 
    
        return $user;
    }

    function isUserLoggedIn() {
        return isset($_SESSION["user"]);
    }

    // Check Admin func
    function isAdmin() {
        // Check user session set
        if (isset($_SESSION["user"])) {
            // Check admin
            if ($_SESSION["user"]["role"] === "admin") {
                return true;
            }
        }
        return false;
    }

    // Check Editor / Admin func
    function isEditor() {
        return isset($_SESSION["user"]) && ($_SESSION["user"]["role"] === "admin" || $_SESSION["user"]["role"] === "editor") ? true : false;
    }
?>