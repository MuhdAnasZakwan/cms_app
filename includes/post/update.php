<?php
    $database = connectToDB();

    $id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $status = $_POST["status"];

    if (empty($id) || empty($title) || empty($content) || empty($status)) {
        $_SESSION["error"] = "Put all";
        header("Location: /manage-posts-edit?id=" . $id);
        exit;
    }

    $sql = "UPDATE posts set title = :title, content = :content, status = :status WHERE id = :id";
    $query = $database->prepare($sql);
    $query->execute([
        "title" => $title,
        "content" => $content,
        "status" => $status,
        "id" => $id
    ]);

    $_SESSION["success"] = "Updated";
    header("Location: /manage-posts");
    exit;
?>