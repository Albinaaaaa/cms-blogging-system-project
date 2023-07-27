<?php
function insertCategories()
{
	global $mysql;
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
}


function findAllCategories()
{
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
}


function deleteCategory()
{
	global $mysql;
	if (isset($_GET['delete'])) {
		$theCatId = $_GET['delete'];
		$query = "DELETE FROM categories WHERE cat_id = {$theCatId}";
		$deleteQuery = $mysql->query($query);
		header("Location: categories.php");
	}
}
