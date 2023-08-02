<?php
if (isset($_POST['add-user'])) {
	// $userId = $_POST['user-id'];
	$userFirstname = $_POST['user-firtsname'];
	$userLastname = $_POST['user-lastname'];
	$username = $_POST['username'];
	$userEmail = $_POST['user-email'];
	// $postImage = $_FILES['post-image']['name'];
	// $postImageTemp = $_FILES['post-image']['tmp_name'];
	$userPassword = $_POST['user-password'];
	$userRole = $_POST['user-role'];
	// $postDate = date('d-m-y');
	// $postCommentCount = 4;

	// move_uploaded_file($postImageTemp, "../images/$postImage");

	$query = "INSERT INTO users(user_firstname, user_lastname, username, user_email, user_password, user_role) VALUES('{$userFirstname}', '{$userLastname}', '{$username}', '{$userEmail}', '{$userPassword}', '{$userRole}')";

	$addUserQuery = $mysql->query($query);
	if (!$addUserQuery) {
		die("Query failed");
	}

	echo "User created" . " " . "<a href='users.php'>View users</a>";
}
?>


<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="user-firtsname">First name</label>
		<input type="text" class="form-control" name="user-firtsname" id="user-firtsname">
	</div>
	<div class="form-group">
		<label for="user-lastname">Last name</label>
		<input type="text" class="form-control" name="user-lastname" id="user-lastname">
	</div>

	<div class="form-group">
		<select name="user-role" id="user-role">
			<option value="subscriber">Select options</option>
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>
		</select>
	</div>


	<!-- <div class="form-group">
		<label for="status">Post status</label>
		<input type="text" class="form-control" name="post-status" id="status">
	</div> -->

	<div class="form-group">
		<label for="Username">Username</label>
		<input type="text" name="username" id="Username">
	</div>

	<div class="form-group">
		<label for="user-email">Email</label>
		<input type="email" name="user-email" id="user-email">
	</div>

	<div class="form-group">
		<label for="user-password">Password</label>
		<input type="password" name="user-password" id="user-password">
	</div>

	<div class="form-group">
		<input type="submit" name="add-user" class="btn btn-primary" value="Add user">
	</div>

</form>