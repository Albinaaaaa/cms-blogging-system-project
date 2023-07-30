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

			echo "<td><a href='users.php?change-to-admin={$userId}'>Change to admin</a></td>";
			echo "<td><a href='users.php?change-to-subscriber={$userId}'>Change to subscriber</a></td>";
			echo "<td><a href='users.php?source=edit-user&edit-user={$userId}'>Edit</a></td>";
			echo "<td><a href='users.php?delete={$userId}'>Delete</a></td>";
			echo "</tr>";
		}
		?>
	</tbody>
</table>


<?php

if (isset($_GET['change-to-admin'])) {
	$theUserId = $_GET['change-to-admin'];
	$query = "UPDATE users SET user_role = 'admin' WHERE user_id = $theUserId";
	$setAdminQuery = $mysql->query($query);
	header("Location: users.php");
}

if (isset($_GET['change-to-subscriber'])) {
	$theUserId = $_GET['change-to-subscriber'];
	$query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $theUserId";
	$setSubscriberQuery = $mysql->query($query);
	header("Location: users.php");
}

if (isset($_GET['delete'])) {
	$theUserId = $_GET['delete'];
	$query = "DELETE FROM users WHERE user_id = $theUserId";
	$deleteUserQuery = $mysql->query($query);
	header("Location: users.php");
}
?>