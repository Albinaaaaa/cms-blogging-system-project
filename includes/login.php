<?php
include "db.php";

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
		$dbId = $row['user_id'];

		echo $dbId;
	}
}
?>