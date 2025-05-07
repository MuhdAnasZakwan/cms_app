<?php
    $database = connectToDB();

    // Data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check Error
    if ( empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION["error"] = "Everything is required";
        // Redirect
        header("Location: /signup");
        exit;
    } else if ($password !== $confirm_password) {
        $_SESSION["error"] = "Unmatched password";
        // Redirect
        header("Location: /signup");
        exit;
    } else {
        // Check Exist
        // SQL Command
        $sql = "SELECT * FROM users WHERE email = :email";
        // Prepare SQL Query
        $query = $database->prepare($sql);
        // Execute SQL Query
        $query->execute([
            "email" => $email
        ]);
        // Fetch (only to get data first row only)
        $user = $query->fetch();
        if ($user) {
            $_SESSION["error"] = "Already sign in lah";
            // Redirect
            header("Location: /signup");
            exit;
        } else {
            // Create account
            // SQL Command
            $sql = "INSERT INTO users (`name`, `email`, `password`) VALUES (:name, :email, :password)";
            // Prepare SQL Query
            $query = $database->prepare($sql);
            // Execute SQL Query
            $query->execute([
                "name" => $name,
                "email" => $email,
                "password" => password_hash($password, PASSWORD_DEFAULT)
            ]);
            $_SESSION["success"] = "got account, now login";
            // Redirect
            header("Location: /login");
            exit;
        }
    }
?>