<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">CMS</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">

				<?php
				session_start();
				$query = "SELECT * FROM categories";
				global $mysql;
				$selectAllCategoriesQuery = $mysql->query($query);

				while ($row = $selectAllCategoriesQuery->fetch_assoc()) {
					$catTitle = $row['cat_title'];
					echo "<li><a href='#'>{$catTitle}</a></li>";
				}
				?>
				<li>
					<a href="admin">Admin</a>
				</li>

				<?php
				if (isset($_SESSION['user_role'])) {
					if (isset($_GET['p-id'])) {
						$thePostId = $_GET['p-id'];
						echo "<li>
					<a href='admin/posts.php?source=edit-post&p-id={$thePostId}'>Edit post</a>
				</li>";
					}
				}
				?>


			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>