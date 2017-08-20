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
      padding: 10px 50px;
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
  </style>
</head>
<body>

<div class="jumbotron text-center">
  <h1>ACM-JUIT</h1> 
  <p>Communicate Valemus</p> 
</div>

<!-- Container (About Section) -->

<div class="container-fluid">
<center>
  <div class="row">
<div class="col-sm-3">
<a href="faculty.php" data-toggle="tooltip" title="FACULTY">
      <span class="glyphicon glyphicon-eye-open logo"></span>
  <h1>FACULTY</H1></a>
    </div>
    <div class="col-sm-3">
<a href="coordinator.php" data-toggle="tooltip" title="COORDINATOR">
      <span class="glyphicon glyphicon-king logo"></span>
  <h1>COORDINATOR</H1></a>
    </div>
<div class="col-sm-3">
<a href="student.php" data-toggle="tooltip" title="STUDENT">
      <span class="glyphicon glyphicon-user logo"></span>
  <h1>STUDENT</H1></a>
    </div>
<div class="col-sm-3">
<a href="guest.php" data-toggle="tooltip" title="GUEST">
      <span class="glyphicon glyphicon-briefcase logo"></span>
  <h1>GUEST</H1></a>
    </div>
</center>
  </div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>
</html>

