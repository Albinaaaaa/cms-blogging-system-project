<?php
ob_start();
?>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Username</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Email</th>
			<th>Role</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>
		<?php

		$query = "SELECT * FROM users";
		$selectUsersQuery = $mysql->query($query);

		while ($row = $selectUsersQuery->fetch_assoc()) {
			$userId = $row['user_id'];
			$username = $row['username'];
			$userPassword = $row['user_password'];
			$userFirstname = $row['user_firstname'];
			$userLastname = $row['user_lastname'];
			$userEmail = $row['user_email'];
			$userImage = $row['user_image'];
			$userRole = $row['user_role'];
			$randSalt = $row['randSalt'];

			echo "<tr>";
			echo "<td>$userId</td>";
			echo "<td>$username</td>";
			echo "<td>$userFirstname</td>";;
			echo "<td>$userLastname</td>";
			echo "<td>$userEmail</td>";
			echo "<td>$userRole</td>";
			echo "<td>Date</td>";

			// $query = "SELECT * FROM posts WHERE post_id = $commentPostId";
			// $selectPostIdQuery = $mysql->query($query);

			// while ($row = $selectPostIdQuery->fetch_assoc()) {
			// 	$postId = $row['post_id'];
			// 	$postTitle = $row['post_title'];
			// 	echo "<td><a href='../post.php?p-id={$postId}'>$postTitle</a></td>";
			// }

			echo "<td><a href='comments.php?approve='>Approve</a></td>";
			echo "<td><a href='comments.php?unapprove='>Unapprove</a></td>";
			echo "<td><a href='comments.php?delete='>Delete</a></td>";
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