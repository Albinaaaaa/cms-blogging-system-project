<?php
ob_start();
?>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Author</th>
			<th>Comment</th>
			<th>Email</th>
			<th>Status</th>
			<th>In response to</th>
			<th>Date</th>
			<th>Approve</th>
			<th>Unapprove</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php

		$query = "SELECT * FROM comments";
		$selectComments = $mysql->query($query);

		while ($row = $selectComments->fetch_assoc()) {
			$commentId = $row['comment_id'];
			$commentPostId = $row['comment_post_id'];
			$commentAuthor = $row['comment_author'];
			$commentEmail = $row['comment_email'];
			$commentContent = $row['comment_content'];
			$commentStatus = $row['comment_status'];
			$commentDate = $row['comment_date'];

			echo "<tr>";
			echo "<td>$commentId</td>";
			echo "<td>$commentAuthor</td>";
			echo "<td>$commentContent</td>";


			// $query = "SELECT * FROM categories WHERE cat_id = {$postCatId}";
			// $selectCatId = $mysql->query($query);

			// while ($row = $selectCatId->fetch_assoc()) {
			// 	$catId = $row['cat_id'];
			// 	$catTitle = $row['cat_title'];
			// }

			// echo "<td>$catTitle</td>";
			echo "<td>$commentEmail</td>";
			echo "<td>$commentStatus</td>";

			$query = "SELECT * FROM posts WHERE post_id = $commentPostId";
			$selectPostIdQuery = $mysql->query($query);
			while ($row = $selectPostIdQuery->fetch_assoc()) {
				$postId = $row['post_id'];
				$postTitle = $row['post_title'];
				echo "<td><a href='../post.php?p-id=$postId'>$postTitle</a></td>";
			}

			echo "<td>$commentDate</td>";
			echo "<td><a href='posts.php?source=edit-post&p-id'>Approve</a></td>";
			echo "<td><a href='posts.php?delete'>Unapprove</a></td>";
			echo "<td><a href='posts.php?source=edit-post&p-id'>Edit</a></td>";
			echo "<td><a href='posts.php?delete'>Delete</a></td>";
			echo "</tr>";
		}
		?>
	</tbody>
</table>


<?php
if (isset($_GET['delete'])) {
	$thePostId = $_GET['delete'];

	$query = "DELETE FROM posts WHERE post_id = $thePostId";
	$deleteQuery = $mysql->query($query);
	header("Location: posts.php");
}
?>