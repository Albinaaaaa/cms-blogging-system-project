<?php
if (isset($_POST['create-post'])) {
	$postTitle = $_POST['title'];
	$postCatId = $_POST['post-category'];
	$postAuthor = $_POST['author'];
	$postStatus = $_POST['post-status'];
	$postImage = $_FILES['post-image']['name'];
	$postImageTemp = $_FILES['post-image']['tmp_name'];
	$postTags = $_POST['post-tags'];
	$postContent = $_POST['post-content'];
	$postDate = date('d-m-y');
	$postCommentCount = 4;

	move_uploaded_file($postImageTemp, "../images/$postImage");

	$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) VALUES('{$postCatId}', '{$postTitle}', '{$postAuthor}', now(), '{$postImage}', '{$postContent}', '{$postTags}', '{$postCommentCount}', '{$postStatus}')";

	$createPostQuery = $mysql->query($query);
	if (!$createPostQuery) {
		die("Query failed");
	}
}
?>


<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post title</label>
		<input type="text" class="form-control" name="title" id="title">
	</div>

	<div class="form-group">
		<select name="post-category" id="post-category">
			<?php
			$query = "SELECT * FROM categories";
			global $mysql;
			$selectCategories = $mysql->query($query);
			if (!$selectCategories) {
				die("Query failed");
			}
			while ($row = $selectCategories->fetch_assoc()) {
				$catTitle = $row['cat_title'];
				$catId = $row['cat_id'];

				echo "<option value='{$catId}'>{$catTitle}</option>";
			}
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="author">Post author</label>
		<input type="text" class="form-control" name="author" id="author">
	</div>

	<div class="form-group">
		<label for="status">Post status</label>
		<input type="text" class="form-control" name="post-status" id="status">
	</div>

	<div class="form-group">
		<label for="post-image">Post image</label>
		<input type="file" name="post-image" id="post-image">
	</div>

	<div class="form-group">
		<label for="post-tags">Post tags</label>
		<input type="text" name="post-tags" id="post-tags">
	</div>

	<div class="form-group">
		<label for="post-content">Post content</label>
		<textarea name="post-content" id="post-content" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="create-post" class="btn btn-primary" value="Publish post">
	</div>

</form>