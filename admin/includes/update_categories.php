<form action="" method="post">
	<div class="form-group">
		<label for="cat-title">Edit Category</label>
		<?php
		if (isset($_GET['edit'])) {
			$catId = $_GET['edit'];
			$query = "SELECT * FROM categories WHERE cat_id = $catId";
			global $mysql;
			$selectCategoriesIdQuery = $mysql->query($query);
			while ($row = $selectCategoriesIdQuery->fetch_assoc()) {
				$catTitle = $row['cat_title'];
				$catId = $row['cat_id'];
		?>

				<input value="<?php if (isset($catTitle)) {
									echo $catTitle;
								} ?>" type="text" class="form-control" name="cat_title" id="">

		<?php
			}
		}
		?>

		<?php // update query
		if (isset($_POST['update-category'])) {
			$theCatTitle = $_POST['cat_title'];
			$query = "UPDATE categories SET cat_title = '{$theCatTitle}' WHERE cat_id = $catId";
			$updateQuery = $mysql->query($query);
			if (!$updateQuery) {
				die("Query failed");
			}
		}
		?>
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="update-category" value="Update">
	</div>
</form>