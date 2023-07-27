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
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                    $searchQuery = $mysql->query($query);

                    if (!$searchQuery) {
                        die("Query failed");
                    }

                    $count = mysqli_num_rows($searchQuery);

                    if ($count == 0) {
                        echo "<h1>No result</h1>";
                    } else {
                        echo "<h1>Some result</h1>";
                    }
                }


                // $query = "SELECT * FROM posts";
                // $selectAllPostsQuery = $mysql->query($query);

                while ($row = $searchQuery->fetch_assoc()) {
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
                    <img class="img-responsive" src="<?php echo $postImage; ?>" alt="">
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