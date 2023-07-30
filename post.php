<?php
include "includes/db.php";
include "includes/header.php";
?>

<body>

    <!-- Navigation -->
    <?php
    include "includes/navigation.php";
    ?>

    <!-- Page Content -->
    <main class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


                <body>
                    <?php

                    if (isset($_GET['p-id'])) {
                        $thePostId = $_GET['p-id'];
                    }

                    $query = "SELECT * FROM posts WHERE post_id = $thePostId";
                    $selectAllPostsQuery = $mysql->query($query);

                    while ($row = $selectAllPostsQuery->fetch_assoc()) {
                        $postTitle = $row['post_title'];
                        $postTags = $row['post_tags'];
                        $postStatus = $row['post_status'];
                        $postAuthor = $row['post_author'];
                        $postDate = $row['post_date'];
                        $postImage = $row['post_image'];
                        $postContent = $row['post_content'];
                    ?>

                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $postTitle; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $postAuthor; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate; ?></p>
                        <hr>
                        <img class="img-responsive" src="<?php if (str_contains($postImage, 'http')) {
                                                                echo $postImage;
                                                            } else {
                                                                echo 'images/' . $postImage;
                                                            } ?>" alt="Background image">
                        <hr>
                        <p><?php echo $postContent; ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

                    <?php
                    }
                    ?>

                    <!-- Blog Comments -->
                    <?php
                    if (isset($_POST['create-comment'])) {
                        $thePostId = $_GET['p-id'];
                        $commentAuthor = $_POST['comment-author'];
                        $commentEmail = $_POST['comment-email'];
                        $commentContent = $_POST['comment-content'];

                        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ($thePostId, '{$commentAuthor}', '{$commentEmail}', '{$commentContent}', 'unapproved', now())";

                        $createCommentQuery = $mysql->query($query);
                        if (!$createCommentQuery) {
                            die("Query failed");
                        }
                    }
                    ?>

                    <!-- Comments Form -->
                    <div class="well">
                        <h4>Leave a Comment:</h4>
                        <form action="" method="post" role="form">
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" name="comment-author" id="author">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="comment-email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="comment">Your comment</label>
                                <textarea class="form-control" rows="3" id="comment" name="comment-content"></textarea>
                            </div>
                            <button type="submit" name="create-comment" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <hr>

                    <!-- Posted Comments -->

                    <?php
                    $query = "SELECT * FROM comments WHERE comment_post_id = {$thePostId} AND comment_status = 'approve' ORDER BY comment_id DESC";
                    $selectCommentQuery = $mysql->query($query);
                    if (!$selectCommentQuery) {
                        die("Query failed");
                    }
                    while ($row = $selectCommentQuery->fetch_assoc()) {
                        $commentDate = $row['comment_date'];
                        $commentContent = $row['comment_content'];
                        $commentAuthor = $row['comment_author'];
                    ?>
                        <!-- Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $commentAuthor; ?>
                                    <small><?php echo $commentDate; ?></small>
                                </h4>
                                <?php echo $commentContent; ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>





            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php
            include "includes/sidebar.php";
            ?>

        </div>
        <!-- /.row -->

        <!-- Footer -->

        <?php
        include "includes/footer.php";
        ?>
    </main>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>