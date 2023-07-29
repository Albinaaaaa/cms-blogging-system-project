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
                <?php
                $query = "SELECT * FROM posts";
                $selectAllPostsQuery = $mysql->query($query);

                while ($row = $selectAllPostsQuery->fetch_assoc()) {
                    $postId = $row['post_id'];
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
                        <a href="post.php?p-id=<?php echo $postId; ?>"><?php echo $postTitle; ?></a>
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