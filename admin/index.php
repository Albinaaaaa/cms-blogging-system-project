<?php
include "includes/admin_header.php";
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
        include "includes/admin_navigation.php";
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin

                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $query = "SELECT * FROM posts";
                                        $selectAllPosts = $mysql->query($query);
                                        $postCount = $selectAllPosts->num_rows;

                                        echo "<div class='huge'>$postCount</div>";
                                        ?>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $query = "SELECT * FROM comments";
                                        $selectAllComments = $mysql->query($query);
                                        $commentsCount = $selectAllComments->num_rows;

                                        echo "<div class='huge'>$commentsCount</div>";
                                        ?>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $query = "SELECT * FROM users";
                                        $selectAllUsers = $mysql->query($query);
                                        $usersCount = $selectAllUsers->num_rows;

                                        echo "<div class='huge'>$usersCount</div>";
                                        ?>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $query = "SELECT * FROM categories";
                                        $selectAllCategories = $mysql->query($query);
                                        $categoriesCount = $selectAllCategories->num_rows;

                                        echo "<div class='huge'>$categoriesCount</div>";
                                        ?>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <script>
                        google.charts.load('current', {
                            packages: ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            // Define the chart to be drawn.
                            var data = new google.visualization.DataTable();
                            data.addColumn('string', 'Element');
                            data.addColumn('number', 'Percentage');
                            data.addRows([
                                ['Nitrogen', 0.78],
                                ['Oxygen', 0.21],
                                ['Other', 0.01]
                            ]);

                            // Instantiate and draw the chart.
                            var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
                            chart.draw(data, null);
                        }
                    </script>
                    <div id="myPieChart" />
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php
    include "includes/admin_footer.php";
    ?>

</body>

</html>