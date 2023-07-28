<?php

if (isset($_GET['p-id'])) {
	$thePostId = $_GET['p-id'];
}

$query = "SELECT * FROM posts";
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
}
?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post title</label>
		<input type="text" value="<?php echo $postTitle; ?>" class="form-control" name="title" id="title">
	</div>

	<div class="form-group">
		<label for="post-category">Post category Id</label>
		<input type="text" value="<?php echo $postCatId; ?>" class="form-control" name="post-category-id" id="post-category">
	</div>

	<div class="form-group">
		<label for="author">Post author</label>
		<input type="text" value="<?php echo $postAuthor; ?>" class="form-control" name="author" id="author">
	</div>

	<div class="form-group">
		<label for="status">Post status</label>
		<input type="text" value="<?php echo $postStatus; ?>" class="form-control" name="post-status" id="status">
	</div>

	<div class="form-group">
		<label for="post-image">Post image</label>
		<input type="file" name="post-image" id="post-image">
	</div>

	<div class="form-group">
		<label for="post-tags">Post tags</label>
		<input type="text" value="<?php echo $postTags; ?>" name="post-tags" id="post-tags">
	</div>

	<div class="form-group">
		<label for="post-content">Post content</label>
		<textarea name="post-content" value="<?php echo $postContent; ?>" id="post-content" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="create-post" class="btn btn-primary" value="Publish post">
	</div>

</form>