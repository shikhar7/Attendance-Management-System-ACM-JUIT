
<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
// Define $username and $password
$username=$_POST['email'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("DB2", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from student where password='$password' AND email='$username'", $connection);
echo mysql_error();
$rows = mysql_num_rows($query);
if ($rows == 1) {
echo "connected";
$_SESSION['login_user']=$_POST['email']; // Initializing Session
$row = mysql_fetch_assoc($query);
$name=$row['name'];
//header("location: $name.php");
/*
$login_session = 'Student';
if($login_session == 'Student')
{
header("location: $name.php");
}
if($login_session == 'Coordinator')
{
header("location: coordinator.php");
}
if($login_session == 'Faculty')
{
header("location: faculty.php");
}
if($login_session == 'Guest')
{
header("location: guest.php");
}*/
echo "Congratulatio!!";
// Redirecting To Other Page
} else {
$error = "Username or Password or Membership is invalid";
}
mysql_close($connection); // Closing Connection
}
?>
