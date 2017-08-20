<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("DB2", $connection);
session_start();
// Storing Session
$user_check=$_SESSION['login_user'];
$ses_sql=mysql_query("select email from student where email='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['email'];
//$name=$row['name'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
//header('Location: home.php'); // Redirecting To Home Page
}
?>
