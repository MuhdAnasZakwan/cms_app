<?php

    // 1. connect to database

    $database = connectToDB();

    // 2. get the user_id from the form

    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    
    // 3. delete the user

    if(empty($id)) {
        header("Location: /manage-posts");
        exit;
    }

    $sql = "DELETE FROM posts WHERE id = :id";
    $query = $database->prepare( $sql );
    $query->execute([
        "id" => $id
    ]);

    // 4. redirect to manage users
    header("Location: /manage-posts"); 
    exit;
?>