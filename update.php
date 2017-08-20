<?php
require('login.php');
if(isset($_SESSION['login_user'])){
//header("location: library1.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ACM-JUIT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .jumbotron {
      background-color: #f4511e;
      color: #fff;
      padding: 100px 25px;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo {
      font-size: 200px;
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
  }
div.container {
    width: 50%;
padding:10px;
margin:100px 0px 0px 320px;
    border: 1px solid gray;
}

header, footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}


article {
    margin:0px;
    border-left: 0px solid gray;
    padding: 0px;
    overflow:hidden;
background-color: white;
}
ul {
    list-style-type: none;
    margin: 0px;
    padding: 0px;
    overflow: hidden;
    background-color: #333;
}

li {
    float: right;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 10px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
input[type=text], select {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=password], select {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit] {
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
  </style>
</head>
<body>

<div class="jumbotron text-center">
  <h1>ACM-JUIT</h1> 
  <p>Communicate Valemus</p> 
  
</div>

<!-- Container (About Section) -->

<div class="container-fluid">
  <div class="row">
<center>    <div class="col-sm-8">
      <header>
   <h1>ACCOUNT INFO</h1>
</header>
<article>
<center>
<div>
<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("DB2", $connection);
$ses_sql=mysql_query("select * from signin where email='$_SESSION[login_user]'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$id=$row['id'];
$fname=$row['fname'];
$lname=$row['lname'];
$email=$row['email'];
$password=$row['password'];
$country=$row['country'];
?>
  <form action="account.php" method="POST">
        First Name:<br><input type="text" name="fname" value=<?php echo $fname?>><BR>
	Last Name<br><input type="text" name="lname" value=<?php echo $lname?>><BR>
	EMAIL<br><input type="text" name="email" value=<?php echo $email?>><BR>
PASSWORD<br><input type="password" name="password" value=<?php echo $password?>><BR>
	COUNTRY</label><br> <select id="country" name="country" value=<?php echo $country?>>
      <option value="india">India</option>
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>
  <input type="submit" value="UPDATE">
  </form>
<?php
if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['password'])&&isset($_POST['email'])&&isset($_POST['country']))
{
$fname=htmlentities($_POST['fname']);
$lname=htmlentities($_POST['lname']);
$email=htmlentities($_POST['email']);
$password=htmlentities($_POST['password']);
$country=htmlentities($_POST['country']);

if(!empty($fname)&&!empty($lname)&&!empty($email)&&!empty($password)&&!empty($country))
{
$sql = "update signin set `fname` = '$fname', `lname` = '$lname', `email` = '$email', `password` = '$password', `country` = '$country' WHERE `signin`.`id` = '$id'";
if (mysql_query($sql) === TRUE) {
    echo "Congratulations";
//header("location: account.php");
} else {
    echo "Please Give the valid details";
}
}
else
{
echo "Fill All The Fields";
}
}
?>
</div>

</center>
</article>
<footer>Copyright by technoseven.weebly.com</footer>
    </div>
  </div>
</div>

</body>
</html>

