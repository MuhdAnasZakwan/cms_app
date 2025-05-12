<?php
    $database = connectToDB();

    $id = $_POST["id"];
    $name = $_POST["name"];
    $role = $_POST["role"];

    if (empty($id) || empty($name) || empty($role)) {
        $_SESSION["error"] = "Put all";
        header("Location: /manage-users-edit?id=" . $id);
        exit;
    }

    $sql = "UPDATE users set name = :name, role = :role WHERE id = :id";
    $query = $database->prepare($sql);
    $query->execute([
        "name" => $name,
        "role" => $role,
        "id" => $id
    ]);

    $_SESSION["success"] = "Updated";
    header("Location: /manage-users");
    exit;
?>