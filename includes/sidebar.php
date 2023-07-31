<div class="col-md-4">

	<!-- Blog Search Well -->
	<div class="well">
		<h4>Blog Search</h4>
		<form action="search.php" method="post">
			<div class="input-group">
				<input type="text" name="search" class="form-control">
				<span class="input-group-btn">
					<button name="submit" class="btn btn-default" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>
		<!-- /.input-group -->
	</div>

	<!-- Login -->
	<div class="well">
		<h4>Login</h4>
		<form action="includes/login.php" method="post">
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Enter username">

			</div>
			<div class="input-group">
				<input type="password" name="password" class="form-control" placeholder="Enter password">
				<span class="input-group-btn">
					<button class="btn btn-primary" name="login" type="submit">
						Submit
					</button>
				</span>
			</div>
		</form>
		<!-- /.input-group -->
	</div>

	<!-- Blog Categories Well -->
	<div class="well">

		<?php
		$query = "SELECT * FROM categories";
		global $mysql;
		$selectCategoriesSidebarQuery = $mysql->query($query);
		?>
		<h4>Blog Categories</h4>
		<div class="row">
			<div class="col-lg-12">
				<ul class="list-unstyled">
					<?php
					while ($row = $selectCategoriesSidebarQuery->fetch_assoc()) {
						$catTitle = $row['cat_title'];
						$catId = $row['cat_id'];
						echo "<li><a href='category.php?category=$catId'>{$catTitle}</a></li>";
					}
					?>
				</ul>
			</div>

		</div>
		<!-- /.row -->
	</div>


	<!-- Side Widget Well -->

	<?php include "widget.php"; ?>

</div>