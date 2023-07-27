<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Author</th>
			<th>Title</th>
			<th>Category</th>
			<th>Status</th>
			<th>Image</th>
			<th>Comments</th>
			<th>Date</th>
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

			echo "<tr>";
			echo "<td>$postId</td>";
			echo "<td>$postAuthor</td>";
			echo "<td>$postTitle</td>";
			echo "<td>$postCatId</td>";
			echo "<td>$postStatus</td>";
			echo "<td><img class='img-responsive' src='$postImage' alt='background image' style='max-width: 150px; width: 100%; margin: 0 auto;'/></td>";
			echo "<td>$postTags</td>";
			echo "<td>$postCommentCount</td>";
			echo "<td>$postDate</td>";
			echo "</tr>";
		}
		?>
	</tbody>
</table>