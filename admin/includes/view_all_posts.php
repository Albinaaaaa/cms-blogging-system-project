<?php

if (isset($_POST['checkBoxArray'])) {
	foreach ($_POST['checkBoxArray'] as $postId) {
		$bulkOptions = $_POST['bulk-options'];
		switch ($bulkOptions) {
			case 'published':
				$query = "UPDATE posts SET post_status = '{$bulkOptions}' WHERE post_id = '{$postId}'";
				$updateToPublishedStatus = $mysql->query($query);
				if (!$updateToPublishedStatus) {
					die("Query is failed");
				}
				break;

			case 'draft':
				$query = "UPDATE posts SET post_status = '{$bulkOptions}' WHERE post_id = '{$postId}'";
				$updateToDraftStatus = $mysql->query($query);
				if (!$updateToDraftStatus) {
					die("Query is failed");
				}
				break;

			case 'delete':
				$query = "DELETE FROM posts WHERE post_id = '{$postId}'";
				$updateToDeleteStatus = $mysql->query($query);
				if (!$updateToDeleteStatus) {
					die("Query is failed");
				}
				break;
		}
	}
}

?>

<form action="" method="post">
	<table class="table table-bordered table-hover">
		<!-- <div class=""> -->
		<div id="bulk-options-container" class="col-xs-4">
			<select class="form-control" name="bulk-options" id="">
				<option value="">Select Options</option>
				<option value="published">Publish</option>
				<option value="draft">Draft</option>
				<option value="delete">Delete</option>
			</select>
		</div>
		<div class="col-xs-4">
			<input type="submit" name="submit" class="btn btn-success" value="Apply">
			<a class="btn btn-primary" href="posts.php?source=add-post">Add new</a>
		</div>
		<!-- </div> -->
		<thead>
			<tr>
				<th><input id="select-all-boxes" type="checkbox"></th>
				<th>Id</th>
				<th>Author</th>
				<th>Title</th>
				<th>Category</th>
				<th>Status</th>
				<th>Image</th>
				<th>Tags</th>
				<th>Comments</th>
				<th>Date</th>
				<th>View post</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$query = "SELECT * FROM posts";
			$selectPosts = $mysql->query($query);

			while ($row = $selectPosts->fetch_assoc()) {
				$postId = $row['post_id'];
				$postAuthor = $row['post_author'];
				$postTitle = $row['post_title'];
				$postCatId = $row['post_category_id'];
				$postStatus = $row['post_status'];
				$postImage = $row['post_image'];
				$postTags = $row['post_tags'];
				$postCommentCount = $row['post_comment_count'];
				$postDate = $row['post_date'];

				if (!str_contains($postImage, 'http')) {
					$postImage = '../images/' . $postImage;
				}

				echo "<tr>";
				echo "<td><input id='select-all-boxes' class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='{$postId}'></td>";
				echo "<td>$postId</td>";
				echo "<td>$postAuthor</td>";
				echo "<td>$postTitle</td>";


				$query = "SELECT * FROM categories WHERE cat_id = {$postCatId}";
				$selectCatId = $mysql->query($query);

				while ($row = $selectCatId->fetch_assoc()) {
					$catId = $row['cat_id'];
					$catTitle = $row['cat_title'];
				}

				echo "<td>$catTitle</td>";
				echo "<td>$postStatus</td>";
				echo "<td><img class='img-responsive' src='$postImage' alt='background image' style='max-width: 150px; width: 100%; margin: 0 auto;'/></td>";
				echo "<td>$postTags</td>";
				echo "<td>$postCommentCount</td>";
				echo "<td>$postDate</td>";
				echo "<td><a href='../post.php?p-id={$postId}'>View post</a></td>";
				echo "<td><a href='posts.php?source=edit-post&p-id={$postId}'>Edit</a></td>";
				echo "<td><a href='categories.php?delete={$postId}'>Delete</a></td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>

</form>


<?php
if (isset($_GET['delete'])) {
	$thePostId = $_GET['delete'];

	$query = "DELETE FROM posts WHERE post_id = $thePostId";
	$deleteQuery = $mysql->query($query);
	header("Location: posts.php");
}
?>