<?php
    // Connect to DB
    $database = connectToDB();

    // Get data from form
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];
    $id = $_POST["id"];

    // Check Error
    if (empty($password) || empty($confirm_password)) {
        $_SESSION["error"] = "Fill everything lah, too lazy ah?";
        header("Location: /manage-users-changepwd?id=" . $id);
        exit;
    } else if ($password !== $confirm_password){
        $_SESSION["error"] = "Why no same? let same same lah, why want different?";
        header("Location: /manage-users-changepwd?id=" . $id);
        exit;
    }
    
    // Update Password
    $sql = "UPDATE users SET password = :password WHERE id = :id";
    $query = $database->prepare($sql);
    $query->execute([
        "password" => password_hash($password, PASSWORD_DEFAULT),
        "id" => $id
    ]);

    // Redirect
    $_SESSION["success"] = "Password change success. Good.";
    header("Location: /manage-users");
    exit;

?>