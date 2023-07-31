<?php
include "db.php";
?>

<?php
session_start();
?>


<?php
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = $mysql->real_escape_string($username);
	$password = $mysql->real_escape_string($password);

	$query = "SELECT * FROM users WHERE username = '{$username}'";
	$selectUserQuery = $mysql->query($query);

	if (!$selectUserQuery) {
		die("query failed");
	}

	while ($row = $selectUserQuery->fetch_array()) {
		$dbUserId = $row['user_id'];
		$dbUsername = $row['username'];
		$dbUserPassword = $row['user_password'];
		$dbUserFirsname = $row['user_firstname'];
		$dbUserLastname = $row['user_lastname'];
		$dbUserRole = $row['user_role'];
	}

	if ($username !== $dbUsername && $password !== $dbUserPassword) {
		header("Location: ../index.php");
	} else if ($username === $dbUsername && $password === $dbUserPassword) {
		$_SESSION['username'] = $dbUsername;
		$_SESSION['firstname'] = $dbUserFirsname;
		$_SESSION['lastname'] = $dbUserLastname;
		$_SESSION['user_role'] = $dbUserRole;

		header("Location: ../admin");
	} else {
		header("Location: ../index.php");
	}
}
?>