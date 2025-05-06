<?php
    // Connect to Database
    $database = connectToDB();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Simple CMS</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"/>
        <style type="text/css">
            body {
                background: #f1f1f1;
            }
        </style>
    </head>
    <body>
        <div class="container mx-auto my-5" style="max-width: 500px;">
            <?php if(isset($_SESSION["user"])):?>
                <h1 class="h1 mb-4 text-center">My Blog</h1>
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Post 4</h5>
                        <p class="card-text">Here's some content about post 4</p>
                        <div class="text-end">
                            <a href="/post" class="btn btn-primary btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Post 3</h5>
                        <p class="card-text">This is for post 3</p>
                        <div class="text-end">
                            <a href="/post" class="btn btn-primary btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Post 2</h5>
                        <p class="card-text">This is about post 2</p>
                        <div class="text-end">
                            <a href="/post" class="btn btn-primary btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Post 1</h5>
                        <p class="card-text">This is a post</p>
                        <div class="text-end">
                            <a href="/post" class="btn btn-primary btn-sm">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-center gap-3">
                    <a href="/logout">Log Out</a>
                </div>

            <?php else: ?>
                <div class="mt-4 d-flex justify-content-center gap-3">
                    <a href="/login" class="btn btn-link btn-sm">Login</a>
                    <a href="/signup" class="btn btn-link btn-sm">Sign Up</a>
                </div>
            <?php endif;?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>