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
				echo "<td><a href='../post.php?p-id={$postId}'>$postTitle</a></td>";
			}

			echo "<td>$commentDate</td>";
			echo "<td><a href='comments.php?approve={$commentId}'>Approve</a></td>";
			echo "<td><a href='comments.php?unapprove={$commentId}'>Unapprove</a></td>";
			echo "<td><a href='comments.php?delete={$commentId}'>Delete</a></td>";
			echo "</tr>";
		}
		?>
	</tbody>
</table>


<?php

if (isset($_GET['unapprove'])) {
	$theCommentId = $_GET['unapprove'];
	$query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id = $theCommentId";
	$setCommentUnapprovedStatusQuery = $mysql->query($query);
	header("Location: comments.php");
}

if (isset($_GET['approve'])) {
	$theCommentId = $_GET['approve'];
	$query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id = $theCommentId";
	$setCommentApprovedStatusQuery = $mysql->query($query);
	header("Location: comments.php");
}

if (isset($_GET['delete'])) {
	$theCommentId = $_GET['delete'];
	$query = "DELETE FROM comments WHERE comment_id = $theCommentId";
	$deleteCommentQuery = $mysql->query($query);
	header("Location: comments.php");
}
?>