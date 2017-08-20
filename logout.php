<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: hello.php"); // Redirecting To Home Page
}
?>
