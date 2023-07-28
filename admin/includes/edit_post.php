<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post title</label>
		<input type="text" class="form-control" name="title" id="title">
	</div>

	<div class="form-group">
		<label for="post-category">Post category Id</label>
		<input type="text" class="form-control" name="post-category-id" id="post-category">
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