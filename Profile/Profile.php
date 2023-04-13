<?php
// check if user is logged in
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Profile Page</title>
	<link rel="stylesheet" href="Profile.css">
</head>
<body>
	<div class="container">
		<h1>Profile</h1>
		<div class="profile">
			<img src="profile_pic.png" alt="Profile Picture">
			<div class="info">
				<h2>Name: John Doe</h2>
				<h3>Email: johndoe@email.com</h3>
				<p>Bio: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at nisi a velit sollicitudin dignissim. Donec vel neque vel orci accumsan scelerisque.</p>
			</div>
		</div>
	</div>
</body>
</html>
