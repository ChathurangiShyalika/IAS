<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: instructor-login.php"); // Redirecting To Home Page
}
?>