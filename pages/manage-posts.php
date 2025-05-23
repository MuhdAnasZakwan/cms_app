<?php
    // Check user
  if (!isUserLoggedIn()) {
    header("Location: /");
    exit;
  }

    // 1. connect to database
  $database = connectToDB();
  // 2. get all the posts
    // 2.1
  $sql = "SELECT * FROM posts";
  // 2.2
  $query = $database->query( $sql );
  // 2.3
  $query->execute();
  // 2.4
  $posts = $query->fetchAll();
?>

<?php
    $loggedInUserID = $_SESSION["user"]["id"];
?>

<?php require "parts/header.php";?>
        <div class="container mx-auto my-5" style="max-width: 700px;">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h1 class="h1">Manage Posts</h1>
                <div class="text-end">
                    <a href="/manage-posts-add" class="btn btn-primary btn-sm">Add New Post</a>
                </div>
            </div>
            <div class="card mb-2 p-4">
                <?php require "parts/message_success.php"; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col" style="width: 40%;">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $index => $post) : ?>
                            <?php if (isEditor() || $loggedInUserID == $post['user_id']) :?>
                                <tr>
                                    <th scope="row"><?php echo $post["id"]; ?></th>
                                    <td><?php echo $post["title"]; ?></td>
                                    <td>
                                        <?php if ( $post['status'] === 'pending' ) : ?>
                                            <span class="badge bg-warning">Pending Review</span>
                                        <?php endif; ?>
                                        <?php if ( $post['status'] === 'publish' ) : ?>
                                            <span class="badge bg-success">Publish</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-end">
                                        <div class="buttons">
                                            <a href="/post" target="_blank" class="btn btn-primary btn-sm me-2"><i class="bi bi-eye"></i></a>
                                            <a href="/manage-posts-edit?id=<?= $post["id"];?>" class="btn btn-secondary btn-sm me-2"><i class="bi bi-pencil"></i></a>
                                            <!-- Button to trigger delete confirmation modal -->
                                            <button type="button" class="btn btn-danger btn-sm me-2" data-bs-toggle="modal" data-bs-target="#userDeleteModal-<?php echo $post["id"]; ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="userDeleteModal-<?php echo $post["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete this post?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-start">
                                                        <p>You're currently trying to delete this post: <?php echo $post['title']; ?></p>
                                                    <p>This action cannot be reversed.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <form
                                                        method="POST"
                                                        action="/post/delete"
                                                        class="d-inline"
                                                        >
                                                        <input type="hidden" 
                                                            name="id"
                                                            value="<?= $post["id"]; ?>" />
                                                        <button class="btn btn-danger"><i class="bi bi-trash"></i> </button>
                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <input type="hidden" name="user_id" value="<?= $post['user_id']; ?>" />
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <a href="/dashboard" class="btn btn-link btn-sm"><i class="bi bi-arrow-left"></i> Back to Dashboard</a>
            </div>
        </div>

<?php require "parts/footer.php";?>