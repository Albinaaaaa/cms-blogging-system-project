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
							<small>Author</small>
						</h1>

						<div class="col-xs-6">
							<?php
							if (isset($_POST['submit'])) {
								$catTitle = $_POST['cat_title'];

								if ($catTitle == "" || empty($catTitle)) {
									echo "THis field should not be empty";
								} else {
									$query = "INSERT INTO categories(cat_title) VALUE('{$catTitle}')";
									$createCategoryQuery = $mysql->query($query);

									if (!$createCategoryQuery) {
										die("Query failed");
									}
								}
							}
							?>
							<form action="" method="post">
								<div class="form-group">
									<label for="cat-title">Add Category</label>
									<input type="text" class="form-control" id="cat-title" name="cat_title">
								</div>
								<div class="form-group">
									<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
								</div>
							</form>

							<?php
							if (isset($_GET['edit'])) {
								$catId = $_GET['edit'];
								include "includes/update_categories.php";
							}
							?>
						</div>

						<div class="col-xs-6">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Id</th>
										<th>Category title</th>
									</tr>
								</thead>
								<tbody>
									<?php // Find all categories
									$query = "SELECT * FROM categories";
									global $mysql;
									$selectCategoriesQuery = $mysql->query($query);
									while ($row = $selectCategoriesQuery->fetch_assoc()) {
										$catTitle = $row['cat_title'];
										$catId = $row['cat_id'];
										echo "<tr>";
										echo "<td>{$catId}</td>";
										echo "<td>{$catTitle}</td>";
										echo "<td><a href='categories.php?delete={$catId}'>Delete</a></td>";
										echo "<td><a href='categories.php?edit={$catId}'>Edit</a></td>";
										echo "</tr>";
									}

									?>

									<?php // Delete query
									if (isset($_GET['delete'])) {
										$theCatId = $_GET['delete'];
										$query = "DELETE FROM categories WHERE cat_id = {$theCatId}";
										$deleteQuery = $mysql->query($query);
										header("Location: categories.php");
									}
									?>
								</tbody>
							</table>
						</div>

					</div>
				</div>
				<!-- /.row -->

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