<?php

if (isset($_GET['edit-user'])) {
	$theUserId = $_GET['edit-user'];

	$query = "SELECT * FROM users WHERE user_id = $theUserId";
	$selectUserQuery = $mysql->query($query);

	while ($row = $selectUserQuery->fetch_assoc()) {
		$userId = $row['user_id'];
		$username = $row['username'];
		$userPassword = $row['user_password'];
		$userFirstname = $row['user_firstname'];
		$userLastname = $row['user_lastname'];
		$userEmail = $row['user_email'];
		$userImage = $row['user_image'];
		$userRole = $row['user_role'];
		$randSalt = $row['randSalt'];
	}
}

if (isset($_POST['edit-user'])) {
	$userFirstname = $_POST['user-firtsname'];
	$userLastname = $_POST['user-lastname'];
	$userRole = $_POST['user-role'];
	$username = $_POST['username'];
	$userEmail = $_POST['user-email'];
	$userPassword = $_POST['user-password'];


	$query = "UPDATE users SET ";
	$query .= "user_firstname = '{$userFirstname}', ";
	$query .= "user_lastname = '{$userLastname}', ";
	$query .= "user_role = '{$userRole}', ";
	$query .= "username = '{$username}', ";
	$query .= "user_email = '{$userEmail}', ";
	$query .= "user_password = '{$userPassword}' ";
	$query .= "WHERE user_id = {$theUserId}";

	$editUserQuery = $mysql->query($query);

	if (!$editUserQuery) {
		die("Query failed");
	}
	header("Location: users.php");
}

?>


<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="user-firtsname">First name</label>
		<input type="text" class="form-control" name="user-firtsname" id="user-firtsname" value="<?php echo $userFirstname; ?>">
	</div>
	<div class=" form-group">
		<label for="user-lastname">Last name</label>
		<input type="text" class="form-control" name="user-lastname" id="user-lastname" value="<?php echo $userLastname; ?>">
	</div>

	<div class="form-group">
		<select name="user-role" id="user-role">
			<!-- <option value="subscriber" >Select options</option> -->
			<option value="admin" <?php if ($userRole === 'admin') {
										echo 'selected';
									} ?>>Admin</option>
			<option value="subscriber" <?php if ($userRole === 'subscriber') {
											echo 'selected';
										} ?>>Subscriber</option>
		</select>
	</div>


	<!-- <div class="form-group">
		<label for="status">Post status</label>
		<input type="text" class="form-control" name="post-status" id="status">
	</div> -->

	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" value="<?php echo $username; ?>">
	</div>

	<div class=" form-group">
		<label for="user-email">Email</label>
		<input type="email" name="user-email" id="user-email" value="<?php echo $userEmail; ?>">
	</div>

	<div class="form-group">
		<label for="user-password">Password</label>
		<input type="password" name="user-password" id="user-password" value="<?php echo $userPassword; ?>">
	</div>

	<div class="form-group">
		<input type="submit" name="edit-user" class="btn btn-primary" value="Edit user">
	</div>

</form>