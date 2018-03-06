<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = '<br><div class="alert alert-danger"><b><center>Username or Password is invalid!</div>';
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root","123","sowpassignmentnew");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection,$_POST['username']);
$password = mysqli_real_escape_string($connection,$_POST['password']);
// Selecting Database
$db = mysqli_select_db($connection,"user");
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection,"select User_Name,Password from user where Password='$password' AND User_Name='$username'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: admin-panel.php"); // Redirecting To Other Page
} else {
$error = '<br><div class="alert alert-danger"><b><center>Username or Password is invalid!</div>';
}
mysqli_close($connection); // Closing Connection
}
}
?>