<?php
session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Cek apakah username dan password sudah benar
	if($username == 'admin' && $password == 'admin') {
		$_SESSION['username'] = $username;
		header('Location: index.php');
		exit();
	} else {
		$error_msg = 'Username or password is wrong';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
		<style>
		body {
	background-color: #f2f2f2;
	font-family: Arial, sans-serif;
}

header {
	background-color: #333;
	color: #fff;
	text-align: center;
	padding: 50px;
}

main {
	background-color: #fff;
	border-radius: 10px;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
	margin: 20px auto;
	max-width: 500px;
	padding: 20px;
}

main h1 {
	color: #333;
	font-size: 24px;
	margin-bottom: 20px;
}

form {
	display: flex;
	flex-direction: column;
}

label {
	font-size: 16px;
	margin-bottom: 10px;
}

input[type=text], input[type=password] {
	border: none;
	border-radius: 5px;
	font-size: 16px;
	padding: 10px;
	margin-bottom: 20px;
}

input[type=submit] {
	background-color: #333;
	border: none;
	border-radius: 5px;
	color: #fff;
	cursor: pointer;
	font-size: 16px;
	padding: 10px;
}

input[type=submit]:hover {
	background-color: #555;
}
		</style>
</head>
<body>
	<header>
		<h1>Login Page</h1>
	</header>

	<main>

		<?php if(isset($error_msg)) { ?>
			<p class="error"><?php echo $error_msg; ?></p>
		<?php } ?>

		<form method="post">
			<label for="username">Username:</label>
			<input type="text" name="username" id="username">

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">

			<input type="submit" value="Login">
		</form>
	</main>
</body>
</html>
