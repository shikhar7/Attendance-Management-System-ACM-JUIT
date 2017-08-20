<?php
require('login.php');
if(isset($_SESSION['login_user']))
{

}
else
{
header("location: home.php"); 
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Shikhar</title>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
table tr:nth-child(even) {
    background-color: #ebebe0 ;
}
table tr:nth-child(odd) {
   background-color:#c2c2a3;
}
table th {
    background-color:#330a00;
    color: white;
}

  .navbar {
      margin-bottom: 0;
      background-color: #f4511e;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
.jumbotron {
      background-color: #f4511e;
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
</style>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">TEAM</a></li>
        <li><a href="#portfolio">PORTFOLIO</a></li>
        <li><a href="#pricing">PROJECT</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="jumbotron text-center">
  <h1>ACM-JUIT</h1> 
  <p>Communicate Valemus</p> 
  
</div>

<div class="container">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>SNO</th>
<th>DATE</th>
<th>STATUS</th>
</tr>
</thead>
    <tbody>
<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("DB2", $connection);
$date=date("Y-m-d");
$result=mysql_query("select * from shikhar order by sno", $connection);

$count=0;
 while( $row = mysql_fetch_array($result))
{
$count=$count+1;
  echo "<tr>";
  echo "<td>".$row['sno']." </td>";
  echo "<td>".$date."</td>";
  echo "<td>".$row['status']." </td>";
  }
  echo "</tr></tbody>";     
  ?>
   </table>
  </div>
</div>
<?php
$n=1;
while($n!=$count+1)
{
//echo "n=".$n;
//echo "\ncount=".$count;
if(isset($_POST['attendence'][$n]))
{
//$name=htmlentities($_POST['name']);
$rollno=htmlentities($_POST['rollno'][$n]);
$attending=htmlentities($_POST['attendence'][$n]);
$comment=$_POST['Comment'][$n];
//echo "attending=".$attending;
//$password=htmlentities($_POST['password']);
//$country=htmlentities($_POST['country']);
$ses_sql=mysql_query("select * from attend where rollno='$rollno'", $connection);
$rows = mysql_fetch_assoc($ses_sql);
$present=$rows['present'];
$absent=$rows['absent'];
if($attending=="present")
{
$present=$rows['present']+1;
}
else
{
$absent=$rows['absent']+1;
}
$attendence=($present/($present+$absent))*100;
if(!empty($attending))
{
$sql = "update attend set `attendence` = '$attendence', `present` = '$present', `absent` = '$absent', `Comment` = '$comment', `date` = '$date' WHERE `attend`.`rollno` = '$rollno'";
if (mysql_query($sql) === TRUE) {
//    echo "Congratulations";
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
$n=$n+1;
}
?>

</body>
</html>
