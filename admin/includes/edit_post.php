<?php
ob_start();

if (isset($_GET['p-id'])) {
	$thePostId = $_GET['p-id'];
}

$query = "SELECT * FROM posts WHERE post_id = $thePostId";
$selectPostsById = $mysql->query($query);

while ($row = $selectPostsById->fetch_assoc()) {
	$postId = $row['post_id'];
	$postAuthor = $row['post_author'];
	$postTitle = $row['post_title'];
	$postCatId = $row['post_category_id'];
	$postStatus = $row['post_status'];
	$postImage = $row['post_image'];
	$postTags = $row['post_tags'];
	$postContent = $row['post_content'];
	$postCommentCount = $row['post_comment_count'];
	$postDate = $row['post_date'];

	if (!str_contains($postImage, 'http')) {
		$postImage = '../images/' . $postImage;
	}
}

if (isset($_POST['update-post'])) {
	$postAuthor = $_POST['post-author'];
	$postTitle = $_POST['post-title'];
	$postCatId = $_POST['post-category'];
	$postStatus = $_POST['post-status'];
	$postImage = $_FILES['post-image']['name'];
	$postImageTemp = $_FILES['post-image']['tmp_name'];
	$postTags = $_POST['post-tags'];
	$postContent = $_POST['post-content'];

	move_uploaded_file($postImageTemp, "../images/$postImage");

	if (empty($postImage)) {
		$query = "SELECT * FROM posts WHERE post_id = $thePostId ";
		$selectImage = $mysql->query($query);
		while ($row = $selectImage->fetch_array()) {
			$postImage = $row['post_image'];
		}
	}

	$query = "UPDATE posts SET ";
	$query .= "post_title = '{$postTitle}', ";
	$query .= "post_category_id = '{$postCatId}', ";
	$query .= "post_date = now(), ";
	$query .= "post_author = '{$postAuthor}', ";
	$query .= "post_status = '{$postStatus}', ";
	$query .= "post_tags = '{$postTags}', ";
	$query .= "post_content = '{$postContent}', ";
	$query .= "post_image = '{$postImage}' ";
	$query .= "WHERE post_id = {$thePostId}";

	$updatePostQuery = $mysql->query($query);

	if (!$updatePostQuery) {
		die("Query failed");
	}

	echo "<p class='bg-success'>Post updated. <a href='posts.php'>All posts</a></p>";

	// header("Location: posts.php");
}
?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post title</label>
		<input type="text" value="<?php echo $postTitle; ?>" class="form-control" name="post-title" id="title">
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
		<input type="text" value="<?php echo $postAuthor; ?>" class="form-control" name="post-author" id="author">
	</div>

	<div class="form-group">
		<select name="post-status" id="">
			<option value="<?php echo $postStatus; ?>"><?php echo $postStatus; ?></option>

			<?php
			if ($postStatus == 'published') {
				echo "<option value='draft'>Draft</option>";
			} else {
				echo "<option value='published'>Published</option>";
			}

			?>
		</select>
	</div>

	<div class="form-group">
		<label for="post-image">Post image</label>
		<img style="max-width: 150px;" src="<?php echo $postImage; ?>" alt="Background image">
		<input type="file" name="post-image" id="post-image">
	</div>

	<div class="form-group">
		<label for="post-tags">Post tags</label>
		<input type="text" value="<?php echo $postTags; ?>" name="post-tags" id="post-tags">
	</div>

	<div class="form-group">
		<label for="post-content">Post content</label>
		<textarea name="post-content" id="summernote" cols="30" rows="10"><?php echo $postContent; ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="update-post" class="btn btn-primary" value="Edit post">
	</div>

</form>