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
				<!-- <li>
					<a href="#">Services</a>
				</li>
				<li>
					<a href="#">Contact</a>
				</li> -->
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>