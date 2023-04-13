<?php
// Start the session and connect to the database
session_start();
require_once('db.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Prepare and execute the query to insert the user data
  $stmt = $pdo->prepare('INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)');
  $stmt->execute([$name, $username, $email, $password]);

  // Redirect to the login page
  header('Location: login.php');
  exit();
}
?>
