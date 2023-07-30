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
                        $author = $_POST['comment-author'];
                        echo $author;
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

                    <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>

                    <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            <!-- Nested Comment -->
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Nested Start Bootstrap
                                        <small>August 25, 2014 at 9:30 PM</small>
                                    </h4>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </div>
                            <!-- End Nested Comment -->
                        </div>
                    </div>



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