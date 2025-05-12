<?php

// 1. connect to database
$database = connectToDB();

// 2. get all the data from the form using $_POST

$title = isset($_POST["title"]) ? $_POST["title"] : "";
$content = isset($_POST["content"]) ? $_POST["content"] : "";
$status = isset($_POST["status"]) ? $_POST["status"] : "";
$user_id = $_SESSION["user"]["id"];

/*
    3. error checking
    - make sure all the fields are not empty 
    - make sure the password is match 
    - make sure the email provided does not exist in the system
*/

if (empty($title) || empty($content) || empty($status)) {
    $_SESSION["error"] = "All fields are required";
    header("Location: /manage-posts-add");
    exit;
}

// 4. create the user account. You need to assign the role to the user
/*
    role options:
    - user
    - editor
    - admin

*/
    //step 1 recipe
    $sql = "INSERT INTO posts (title, content, status, user_id) VALUES (:title, :content, :status, :user_id)";
    //step 2 prepare
    $statement = $database->prepare($sql);
    //step 3 let them cook
    $statement->execute([ 
        "title" => $title,
        "content" => $content,
        "status" => $status,
        "user_id" => $user_id,
    ]);
    
    //step 4 display success message
    $_SESSION["success"] = "Post have been created";


    // 5. Redirect back to the /manage-users page
    header("Location: /manage-posts"); 
    exit; 
?>