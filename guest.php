<?php
require('login.php');
if(isset($_SESSION['login_user'])){
header("location: library1.php"); 
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
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo"></span>
    </div>
    <div class="col-sm-8">
      <form class="form-inline" role="form" action="guest.php" method="POST">
    <div class="input-group">
      <input type="email" class="form-control" id="email" name="email" size="50" placeholder="Email Address" value=""required><br>
      <input type="password" class="form-control" id="password" name="password" size="50" placeholder="Password" required><br>
			<input id="submit" name="submit" type="submit" value="submit" class="btn btn-danger">
		</div>
<br><br><span class="btn"><?php echo $error; ?></span>
  </form>
    </div>
  </div>
</div>

</body>
</html>

