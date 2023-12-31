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
							insertCategories();
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

							<?php //update and include
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
									findAllCategories();
									?>

									<?php // Delete query
									deleteCategory();
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