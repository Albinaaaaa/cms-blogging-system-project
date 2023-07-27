<?php
include "includes/header.php";
?>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<?php
		include "includes/navigation.php";
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
							<form action="">
								<div class="form-group">
									<label for="cat-title">Add Category</label>
									<input type="text" class="form-control" id="cat-title" name="cat_title">
								</div>
								<div class="form-group">
									<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
								</div>
							</form>
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
									<tr>
										<td>Baseball Category</td>
										<td>Baseketball Category</td>
									</tr>
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
	include "includes/footer.php";
	?>

</body>

</html>